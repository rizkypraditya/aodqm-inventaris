<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $SocialUser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
          'provider_id' => $SocialUser->id,
          'provider' => $provider
        ], [
            'name' => $SocialUser->name,
            'username' => $SocialUser->username,
            'password' => Hash::make('123'),
            'email' => $SocialUser->email,
            'provider_token' => $SocialUser->token,
            
        ]);
    
        Auth::login($user);
    
        return redirect('/dashboard');
        
    }


}
