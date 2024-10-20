<?php

namespace App\Livewire\Lessons;

use Livewire\Component;

class Lesson2Actions extends Component
{
    public $todo = '';

    public $todos = [
        'Wash Hands',
        'Take a bath'
    ];
    public function addTodo(){
        $this->todos[] = $this->todo;

        $this->todo = '';
    }
    
    public function render()
    {
        return view('livewire.lessons.lesson2-actions');
    }
}