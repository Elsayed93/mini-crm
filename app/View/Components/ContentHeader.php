<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContentHeader extends Component
{

    public string $mainPage;
    public string $subPage;
    public string $route;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $mainPage, string $subPage, string $route)
    {
        $this->mainPage = $mainPage;
        $this->subPage = $subPage;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.content-header');
    }
}
