<?php

namespace App\View\Components\Atoms;

use Illuminate\View\Component;

class Input extends Component
{
    public $label, $props, $type;

    public function __construct($label, $props, $type = 'text')
    {
        $this->label = $label;
        $this->props = $props;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.atoms.input');
    }
}
