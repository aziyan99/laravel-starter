<?php

namespace App\View\Components\Backend;

use App\Models\Setting;
use Illuminate\View\Component;

class Logo extends Component
{
    public $name;
    public $logo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $setting = Setting::first();
        $this->name = $setting->name;
        $this->logo = $setting->logo_path;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.logo');
    }
}
