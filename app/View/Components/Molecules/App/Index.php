<?php

namespace App\View\Components\Molecules\App;

use Illuminate\View\Component;

class Index extends Component
{
    public $route, $title, $rows;

    public function __construct($route, $title, $rows)
    {
        $this->route = $route;
        $this->title = $title;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.molecules.app.index');
    }
}
