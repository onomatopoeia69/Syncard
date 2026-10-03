<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{

     public function redirect()
    {
            return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    

  
    public function callback()
    {
        try {

        $user = Socialite::driver('google')->user();

        } catch (\Throwable $e) {

            return redirect()->route('home.index')->with('error', 'Google authentication failed.');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
                
            $existingUser->update([
                'google_token' => $user->token,
                'google_refresh_token' => $user->refreshToken,
                'google_token_expires_at' => now()->addSeconds($user->expiresIn),
            ]);
            
            Auth::login($existingUser);

            return redirect()->route('users.dashboard')->with([
                'welcome' => 'Welcome!',
                'time' => now()->diffForHumans()
            ]);

            

        
        }else{ 

            $newUser = User::updateOrCreate([
                'email' => $user->getEmail(),
            ], [
                'name' => $user->name,
                'password' => bcrypt(Str::random(16)), 
                'google_token' => $user->token,
                'google_refresh_token' => $user->refreshToken,
                'google_token_expires_at' => now()->addSeconds($user->expiresIn),
                'email_verified_at' => now(),
            ]);   
            
            Auth::login($newUser);

            return redirect()->route('users.dashboard')->with([
                'welcome' => 'Welcome!',
                'time' => now()->diffForHumans()
            ]);
        }

       
          
    }

}
