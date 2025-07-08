<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputField extends Component
{
    public $name, $label, $type, $value, $placeholder;

    public function __construct($name, $label, $type = 'text', $value = '', $placeholder = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.input-field');
    }
}
