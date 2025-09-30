<?php

namespace App\View\Components;

use App\Models\Contact as ModelsContact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Contact extends Component
{
    public $contact;

    public function __construct(ModelsContact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact');
    }
}
