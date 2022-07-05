<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class doctor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $doctors;
    public function __construct()
    {
        $this->doctors = DB::table("doctors")->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.doctor');
    }
}
