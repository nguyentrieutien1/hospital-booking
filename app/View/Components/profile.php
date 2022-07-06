<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class profile extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user = [];
    public function __construct()
    {
        $this->user = DB::table("users")->where("id", Auth::user()->id)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile');
    }
}
