<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageTitle extends Component
{
    /**
     * The Title.
     *
     * @var string
     */
    public $title;

    /**
     * The Action.
     *
     * @var array
     */
    public $action;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $action = null)
    {
        $this->title = $title;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-title');
    }
}
