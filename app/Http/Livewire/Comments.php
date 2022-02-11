<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati expedita quae commodi qui eveniet maxime nulla, quidem nesciunt autem voluptate reiciendis voluptates accusantium ad. Cupiditate nemo reiciendis fugiat reprehenderit debitis.',
            'created_at' => '3 min ago',
            'creator' => 'Pav'
        ]
    ];

    public function render()
    {
        return view('livewire.comments');
    }
}
