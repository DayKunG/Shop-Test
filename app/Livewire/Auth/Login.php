<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('products.index');
        }

        $this->addError('email', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
