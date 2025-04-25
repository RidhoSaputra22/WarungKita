<?php

namespace App\View\Components;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */

     public $keranjang;

    public function __construct(
    )
    {
        if(Auth::check()){

            $this->keranjang = Cart::where('222339_id_user', '=', Auth::user()['222339_id_user'])
                                    ->where('222339_status', 'belum')
                                    ->count();
        }

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
