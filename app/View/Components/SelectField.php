<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectField extends Component
{
    /**
     * The field name.
     *
     * @var string
     */
    public $name;

    /**
     * The field options.
     *
     * @var array
     */
    public $options;

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
    public function __construct($name, $options, $value = '')
    {
        $this->name = $name;
        $this->options = $options;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-field');
    }
}
