<?php

namespace App\Livewire\AuthComponent;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignUp extends Component
{
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $password = '';

    public function store(){
        $exist = User::where('email',$this->email)->first();

        if(!$exist){
            $store = User::create([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Fetch the userID and push to the session
            $user = User::where('email',$this->email)->first();
            
            if($store){
                Session::put('userID',$user->userID);
                // return $this->redirect('/product',navigate:true);
                return redirect()->route('livewire.product');
            }else{
                return redirect()->route('livewire.signUp')
                ->with('error','Data store failed!');
            }

        }else{
            return redirect()->route('livewire.signUp')
            ->with('error','Email Already Registered!');
        }

    }

    public function render()
    {
        return view('livewire.auth-component.sign-up');
    }
}