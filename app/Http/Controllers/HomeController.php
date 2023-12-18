<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;


use Session;
use Stripe;

use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{

    public function index()
    {
        $product=Product::paginate(6);
        $message = session('message'); 
        return view('home.userpage',compact('product'));
    }
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {

            $total_product=product::all()->count();

            $total_order=order::all()->count();

            $total_user=user::all()->count();

            $order=order::all();

            $total_revenue=0;

            foreach($order as $order)

            {

                $total_revenue=$total_revenue + $order->price;

            }

            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();

            $total_processing=order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }

        else
            {
                        $product=Product::paginate(6);
                return view('home.userpage',compact('product'));
            }
    }

    public function product_details($id)
    {

        $product=product::find($id);

        return view('home.product_details',compact('product'));

    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $product = Product::find($id);
    
            $availableQuantity = $product->quantity; // Get the available quantity
    
            // Validate requested quantity against available quantity
            $requestedQuantity = $request->input('quantity');
    
            $existingCartItem = Cart::where('Product_id', $id)
                ->where('user_id', $userid)
                ->first();
    
            if ($existingCartItem) {
                // Calculate the total requested quantity
                $totalRequestedQuantity = $existingCartItem->quantity + $requestedQuantity;
    
                if ($totalRequestedQuantity > $availableQuantity) {
                    Alert::error('Error', 'Requested quantity exceeds available quantity')->autoClose(4000);
                    return redirect()->back();
                }
    
                // Update the existing cart item
                $existingCartItem->quantity += $request->quantity;
                $existingCartItem->price = $product->discount_price !== null ?
                    $product->discount_price * $existingCartItem->quantity :
                    $product->price * $existingCartItem->quantity;
                $existingCartItem->save();
    
                Alert::success('Product Added Successfully', 'We have added the product to the cart');
    
                return redirect()->back();
            } else {
                // Calculate the total requested quantity for a new item
                if ($requestedQuantity > $availableQuantity) {
                    Alert::error('Error', 'Requested quantity exceeds available quantity')->autoClose(4000);
                    return redirect()->back();
                }
    
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = substr($user->phone, 0, 20);
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;
    
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }
    
                $cart->image = $user->image;
                $cart->Product_id = $product->id;
                $cart->quantity = $request->quantity;
                $cart->save();
    
                Alert::success('Product Added Successfully', 'We have added the product to the cart');
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    

    

    public function show_cart()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;

        $cart=cart::where('user_id','=',$id)->get();

        return view('home.showcart',compact('cart'));
        }

        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {

        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $cartItems = cart::where('user_id', '=', $userid)->get();
    
        foreach ($cartItems as $item)
        {
            $order = new order;
    
            $order->name = $item->name;
            $order->email = $item->email;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->user_id = $item->user_id;
    
            $order->product_title = $item->product_title;
            $order->price = $item->price;
            $order->quantity = $item->quantity;
            $order->image = $item->image;
            $order->product_id = $item->product_id;
    
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
    
            $order->save();
    
            // Update product quantity
            $product = Product::find($item->product_id);
            if ($product) {
                $product->quantity -= $item->quantity;
                $product->save();
            }
    
            // Delete the cart entry
            $cart_id = $item->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
    
        return redirect()->back()->with('message', 'We have Received your Order. We will connect with you soon...');
    }
    

    public function stripe($totalprice)
    {


        return view('home.stripe',compact('totalprice'));
    }


    public function stripePost(Request $request,$totalprice)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "php",
                "source" => $request->stripeToken,
                "description" => "Thank you for payment" 
        ]);

        $user=Auth::user();



        $userid=$user->id;



        $data=cart::where('user_id','=',$userid)->get();





        foreach($data as $data)
        {
            $order=new order;


            $order->name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;


            $order->product_title=$data->product_title;

            $order->price=$data->price;

            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->product_id;

            $order->payment_status='Paid';

            $order->delivery_status='processing';



            $order->save();

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();




        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {

            $user=Auth::user();

            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }

        else
        {

            return redirect('login');
        }

    }

    public function product_search(Request $request){

        $search_text=$request->search;

        $product=product::where('title','LIKE',"%$search_text%")->orWhere
        ('category','LIKE',"%$search_text%")->paginate(10); 

        return view('home.userpage',compact('product'));

    }

    public function contact(){

        return view('home.contact');
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);
    
        if (!$order) {
            // Handle order not found
            return redirect()->back()->with('error', 'Order not found');
        }
    
        // Store the quantity of items being canceled
        $cancelledQuantity = $order->quantity;
    
        // Update the order status to 'Canceled'
        $order->delivery_status = 'Cancelled';
        $order->save();
    
        // Restore the product quantity
        $product = Product::find($order->product_id);
    
        if ($product) {
            // Increase the product quantity by the cancelled quantity
            $product->quantity += $cancelledQuantity;
            $product->save();
        } else {
            // Handle product not found
            return redirect()->back()->with('error', 'Product not found');
        }
    
        return redirect()->back()->with('success', 'Order canceled successfully. Item quantity restored.');
    }
    

    public function product(){

        $product=Product::paginate(6);

        return view('home.all_product',compact('product'));
    }

    public function search_product(Request $request){

        $search_text=$request->search;

        $product=product::where('title','LIKE',"%$search_text%")->orWhere
        ('category','LIKE',"%$search_text%")->paginate(10); 

        return view('home.all_product',compact('product'));

    }

}
