<?php

namespace App\Livewire\AuthComponent;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignIn extends Component
{

    public $email = '';
    public $password = '';
    public $resetEmail = '';
    public $newPassword = '';

    public function check(){
        // Fetch the data using email
        $user = User::where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password)) {
            Session::put('userID',$user->userID);
            
            switch($user->role){
                case 'Customer':
                    $this->redirectRoute('livewire.product');
                    break;
                case 'Super Admin':
                    $this->redirectRoute('admin.dashboard');
                    break;
            }
            
            
        } else {
            $this->redirectRoute('livewire.signIn');
        }
    }

    public function resetPass(){
        $user = User::where('email',$this->resetEmail)
        ->update([
            'password'=> Hash::make($this->newPassword)
        ]);

        if($user){
            return redirect()->route('livewire.signIn')
            ->with('success','Reset Password Success.');
        }else{
            return redirect()->route('livewire.signIn')
            ->with('error','Reset Password Failed!');
        }
    }
    
    public function render()
    {
        return view('livewire.auth-component.sign-in');
    }
}