<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NumberField extends Component
{
    /**
     * The field name.
     *
     * @var string
     */
    public $name;

    /**
     * The field step.
     *
     * @var number
     */
    public $step;

    /**
     * The field value.
     *
     * @var string
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $step = 1, $value = '')
    {
        $this->name = $name;
        $this->step = $step;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.number-field');
    }
}
