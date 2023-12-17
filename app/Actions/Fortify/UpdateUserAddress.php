<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Laravel\Fortify\Contracts\UpdatesUserAddressInformation;
use Illuminate\Support\Facades\Validator;

class UpdateUserAddress implements UpdatesUserAddressInformation
{
    public function update(User $user, array $input)
    {
        Validator::make($input, [
            'city' => ['required', 'string'],
            'district' => ['required', 'string'],
            'street' => ['required', 'string'],
        ])->validate();

        $user->forceFill([
            'city' => $input['city'],
            'district' => $input['district'],
            'street' => $input['street'],
        ])->save();
    }
}
