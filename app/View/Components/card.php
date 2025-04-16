<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(

        public string $nama = 'NAMA PRODUK',
        public string $harga = '20,000',
        public string $image = 'image/product/drink.jpg',
        public string $id = '',




    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
