<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Livewire\Component;

class Login extends Component
{

    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $password;
        
   #[Validate('required|email|exists:users,email,role,!admin', as: 'email')]
    public $forgotEmail;

    public $cooldown = 0;

    public function inputLogin()
    {

       $this->rateLimit();

       $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];
       
        if (!Auth::attempt($credentials)) {
            if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            RateLimiter::hit($this->throttleKey(),60); // increment failed attempts
            }
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }

        RateLimiter::clear($this->throttleKey()); 
        $this->reset();

        $user = Auth::user();

        session()->flash('welcome', 'Welcome back!');
        session()->flash('time', now()->diffForHumans());
        

        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'staff':
                return redirect()->route('staff.dashboard');
            default:
               session()->flash('emailVerified', Auth::user()->is_email_verified);
                return redirect()->intended()->route('users.dashboard');
            }

    }

    
    protected function rateLimit()
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $this->cooldown = RateLimiter::availableIn($this->throttleKey());
            $this->dispatch('clearAfterError');
            $this->reset('email','password');
        }
    }


    #[On('clearAfterError')]
    public function updatedEmail()
    {

        $this->resetErrorBag();

    }


    protected function throttleKey()
    {
        return Str::lower($this->email) . '|' . request()->ip();
    }

    public function decrementCooldown()
    {

        if($this->cooldown > 0){

            $this->cooldown--;

            if ($this->cooldown === 0) {
                RateLimiter::clear($this->throttleKey());
            }
        }

    }

    public function clearFields(){

        $this->reset();
        $this->resetErrorBag(); 

    }   

    public function forgotRegister()
    {


        dd($this->forgotEmail);

    }

    public function redirectToGoogle()
    {
        return redirect()->route('google.redirect');
        
    }

    public function redirectToFacebook()
    {
        return redirect()->route('facebook.redirect');
    }
    

    public function render()
    {
        return view('livewire.auth.login');
    }    
}
