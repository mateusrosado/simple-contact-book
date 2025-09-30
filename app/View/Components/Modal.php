<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $title;
    public $id;
    public $contactid;
    public $mode;

    public function __construct(string $title, string $id, string $contactid = "", string $mode = "")
    {
        $this->title = $title;
        $this->id = $id;
        $this->contactid = $contactid;
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
