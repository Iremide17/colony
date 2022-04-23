<?php

namespace App\View\Components\Social;

use Illuminate\View\Component;

class Share extends Component
{
    public $property;
    public $url;
    
    public function __construct($property, $url)
    {
        $this->property = $property;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.social.share');
    }
}