<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DefaultButton extends Component
{
    
    public $linkto;
    public $color;

    public function __construct(string $linkto = "", string $color = 'green')
    {
        $this->linkto = $linkto;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.default-button');
    }
}