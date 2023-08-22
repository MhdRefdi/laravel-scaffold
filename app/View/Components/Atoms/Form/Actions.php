<?php

namespace App\View\Components\Atoms\Form;

use Illuminate\View\Component;

class Actions extends Component
{
    public $show, $edit, $delete, $route, $id;

    public function __construct($show = true, $edit = true, $delete = true, $route, $id)
    {
        $this->show = $show;
        $this->edit = $edit;
        $this->delete = $delete;
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
        return view('components.atoms.form.actions');
    }
}
