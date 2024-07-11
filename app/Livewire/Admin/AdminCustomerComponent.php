<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCustomerComponent extends Component
{
    use WithPagination;

    public $user_id;

    public function deleteProduct($id){
        $product = User::find($id);
        // unlink('assets/imgs/products/'.$product->image);
        $product->delete();
        session()->flash('message','User has been deleted successfully.');
    }

    public function render()
    {
        $customers = User::orderBy('created_at','ASC')->paginate(5);
        return view('livewire.admin.admin-customer-component',['customers'=>$customers]);
    }
}
