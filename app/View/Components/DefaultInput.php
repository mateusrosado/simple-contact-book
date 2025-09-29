<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DefaultInput extends Component
{
    public $id;
    public $labelText;
    public $type;
    
    public function __construct(string $id, ?string $labelText = null, string $type = 'text')
    {
        $this->id = $id;
        $this->labelText = $labelText;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.default-input');
    }
}
