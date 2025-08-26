<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertMessage extends Component
{
    public string $type;
    public ?string $message;

    public function __construct(string $type='info', ?string $message = null)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render()
    {
        return view('components.alert-message');
    }
}
