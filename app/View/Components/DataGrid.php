<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataGrid extends Component
{
    /**
     * The DataGrid column definitions.
     *
     * @var array
     */
    public $columnDefs;

    /**
     * The DataGrid data rows.
     *
     * @var array
     */
    public $rows;

    /**
     * The DataGrid makeRowEditAction.
     *
     * @var callable
     */
    public $makeRowEditAction;

    /**
     * The DataGrid makeRowDeleteAction.
     *
     * @var callable
     */
    public $makeRowDeleteAction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columnDefs, $rows, $makeRowEditAction, $makeRowDeleteAction)
    {
        $this->columnDefs = $columnDefs;
        $this->rows = $rows;
        $this->makeRowEditAction = $makeRowEditAction;
        $this->makeRowDeleteAction = $makeRowDeleteAction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-grid');
    }
}
