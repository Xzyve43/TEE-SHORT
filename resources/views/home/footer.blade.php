<footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS: </strong>Gat Tayaw Street, Liliw, Philippines</p>
                        <p><strong>PHONE: </strong>0910 885 9661</p>
                        <p><strong>EMAIL: </strong>youremail@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="{{url('/')}}">Home</a></li>
                           <li><a href="{{url('products')}}">Products</a></li>
                           <li><a href="{{url('contact')}}">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="{{ route('login') }}">Login</a></li>
                           <li><a href="{{ route('register') }}">Register</a></li>
                           <li><a href="{{url('show_cart')}}">Shopping</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     

                  </div>
               </div>
            </div>
         </div>
      </footer>