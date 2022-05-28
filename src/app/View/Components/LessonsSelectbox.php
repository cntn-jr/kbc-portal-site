<?php

namespace App\View\Components;

use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Boolean;

class LessonsSelectbox extends Component
{

    public $lessons;
    public $selectedLesson;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lessons, $selectedLesson = null)
    {
        $this->lessons = $lessons;
        $this->selectedLesson = $selectedLesson;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lessons-selectbox');
    }
}
