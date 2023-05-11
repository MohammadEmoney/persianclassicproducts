<?php

namespace App\Http\Livewire\Front\Products;

use Livewire\Component;

class Card extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.front.products.card');
    }
}
