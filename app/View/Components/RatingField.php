<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RatingField extends Component
{

    public $id;
    public $label;
    public $rangeMin;
    public $rangeMax;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $id,
        string $label,
        int $rangeMin,
        int $rangeMax,
    ) {
        $this->id = $id;
        $this->label = $label;
        $this->rangeMin = $rangeMin;
        $this->rangeMax = $rangeMax;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.rating-field');
    }
}
