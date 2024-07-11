<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $customers = User::all()->count();
        $products = Product::all()->count();
        $categories = Category::all()->count();
        return view('livewire.admin.admin-dashboard-component',
        ['customers'=>$customers,'products'=>$products,'categories'=>$categories]);
    }
}
