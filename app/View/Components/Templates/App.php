<?php

namespace App\View\Components\Templates;

use Illuminate\View\Component;

class App extends Component
{
    public $title, $datatable, $livewire;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $datatable = false, $livewire = false)
    {
        $this->title = $title;
        $this->datatable = $datatable;
        $this->livewire = $livewire;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.templates.app');
    }
}
