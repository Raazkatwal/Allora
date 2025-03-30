<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $title = 'Login';
    public $username, $email, $password, $password_confirmation, $remember_me;

    public function login(){
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], [
            'email.required' => 'The E-mail field is required',
            'email.exists' => 'This E-mail is not registered.',
            'email.email' => 'Please Enter a valid E-mail address.',
            'password.required' => 'The Password field is required',
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            return $this->redirect(Home::class);
        } else {
            $this->addError('password', 'The Password is incorrect.');;
        }
    }
    public function signup(){
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required|min:6|confirmed',
        ],[
            'email.required' => 'The E-mail field is required',
            'email.unique' => 'This E-mail is already registered.',
            'email.email' => 'Please Enter a valid E-mail address.',
            'username.required' => 'Name is required',
            'password.required' => 'The Password field is required',
            'password.confirmed' => 'Passwords didn\'t matched',
        ]);
        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'username' => $this->username,
        ]);
        $user->profile()->create([
            'user_id' => $user->id,
            'usertype' => 'customer'
        ]);
        Auth::login($user, true);
        return $this->redirect(Home::class);
    }
    public function render()
    {
        return view('livewire.login')->layout('components.layouts.app', ['title' => $this->title]);
    }
}
