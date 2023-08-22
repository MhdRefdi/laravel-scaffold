<?php

namespace App\View\Components\Molecules\App;

use Illuminate\View\Component;

class Create extends Component
{
    public $title, $route;

    public function __construct($title, $route)
    {
        $this->title = $title;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.molecules.app.create');
    }
}
