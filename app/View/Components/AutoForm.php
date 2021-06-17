<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AutoForm extends Component
{
    /**
     * The form action.
     *
     * @var string
     */
    public $action;

    /**
     * The form method.
     *
     * @var string
     */
    public $method;

    /**
     * The form Field Definitions.
     *
     * @var array
     */
    public $fieldDefs;

    /**
     * The form Cancel Link.
     *
     * @var array
     */
    public $cancelLink;

    /**
     * The previously submitted values.
     *
     * @var array
     */
    private $oldValues;

    /**
     * The predefined values.
     *
     * @var array
     */
    private $values;

    /**
     * Create a new component instance.
     * @param string $action
     * @param array $fieldDefs
     * @return void
     */
    public function __construct($action, $fieldDefs, $method = 'POST', $values = [], $cancelLink = '')
    {
        $this->action = $action;
        $this->method = $method;
        $this->fieldDefs = $fieldDefs;
        $this->cancelLink = $cancelLink;
        $this->oldValues = old();
        $this->values = $values;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $oldValue = function () { return $this->oldValue; };
        return view('components.auto-form', compact('oldValue'));
    }

    public function oldValue($name)
    {
        if(array_key_exists($name, $this->oldValues))
        {
            return $this->oldValues[$name];
        }

        if (isset($this->values[$name]))
        {
            return $this->values[$name];
        }

        return null;
    }
}
