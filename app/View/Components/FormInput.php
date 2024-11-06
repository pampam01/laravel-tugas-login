<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $label;
    public $name;
    public $value;

    public function __construct($label, $name, $value = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }
    
    public function render()
    {
        return view('components.form-input');
    }
}
