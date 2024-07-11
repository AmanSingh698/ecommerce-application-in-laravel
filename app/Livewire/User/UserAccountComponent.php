<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserAccountComponent extends Component
{
    public function render()
    {
        $users = User::all();
        $peoples = $users['name'];
        return view('livewire.user.user-account-component',['peoples'=>$peoples]);
    }
}
