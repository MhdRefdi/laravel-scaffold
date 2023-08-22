<?php

namespace App\View\Components\Molecules;

use Illuminate\View\Component;

class Form extends Component
{
    public $method;

    public function __construct($method = '')
    {
        $this->method = $method;
    }

    public function render()
    {
        return view('components.molecules.form');
    }
}
