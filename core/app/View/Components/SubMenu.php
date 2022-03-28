<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SubMenu extends Component{
    public $menu;
    public $ico = [ 'menu_data.png', 'menu_data.png' ];
    public $margin;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menu, $margin = 3){
        $this->menu = $menu;
        $this->margin = $margin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sub-menu');
    }
}
