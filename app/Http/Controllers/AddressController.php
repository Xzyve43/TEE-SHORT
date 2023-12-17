<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function showAddressForm()
    {
        // Fetch authenticated user's address data and pass it to the view
        $user = auth()->user();
        return view('profile.address-update', compact('user'));
    }

    public function updateAddress(Request $request)
    {
        $user = auth()->user();

        $validatedData = Validator::make($request->all(), [
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'street' => ['required', 'string'],
        ])->validate();

        $user->forceFill([
            'city' => $validatedData['city'],
            'district' => $validatedData['district'],
            'street' => $validatedData['street'],
        ])->save();

        return redirect()->route('address.show')->with('success', 'Address updated successfully');
    }
}
