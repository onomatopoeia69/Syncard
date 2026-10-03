<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required')]
    public $fname = '';
    #[Validate('required')]
    public $lname='';
    #[Validate('required|numeric')]
    public $phone='';
    #[Validate('required|email|unique:users,email', as: 'email')]
    public $regEmail='';
    #[Validate('required|string|min:8' , as: 'password')]
    public $regPassword = '';
    #[Validate('required|same:regPassword', as: 'confirmation password')]
    public $confirmPass = '';


    public function register()
    {
        
        $this->validate();

        try{

        $user = User::create([
            'name' => Str::title($this->fname).' '.Str::title($this->lname),
            'email' => $this->regEmail,
            'password' => bcrypt($this->regPassword),
        ]);

        event(new Registered($user));

        $this->reset();

        $this->resetErrorBag();

        Auth::login($user);

        session()->flash('welcome', 'Welcome! ');
        session()->flash( 'time', now()->diffForHumans());
        session()->flash( 'emailVerified', Auth::user()->is_email_verified);
    
        return redirect()->route('users.dashboard');

            
        }catch(\Exception $e){


            
        }
    }

    public function clearFields()
    {
        $this->reset();
        $this->resetErrorBag(); 
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
        return view('livewire.auth.register');
    }
}
