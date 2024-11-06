<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ValidationError extends Component
{
    public string $error;
    /**
     * Create a new component instance.
     */
    public function __construct(string $error)
    {
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.validation-error');
    }
}