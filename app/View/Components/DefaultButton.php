<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DefaultButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $linkto,
        public string $id,
        public string $class

    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.default-button');
    }
}
