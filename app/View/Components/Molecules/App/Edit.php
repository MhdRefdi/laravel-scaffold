<?php

namespace App\View\Components\Molecules\App;

use Illuminate\View\Component;

class Edit extends Component
{
    public $title, $route, $id;

    public function __construct($title, $route, $id)
    {
        $this->title = $title;
        $this->route = $route;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.molecules.app.edit');
    }
}
