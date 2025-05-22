<?php

namespace App\Livewire\Reporting;

use Livewire\Component;
use App\Models\Project;

class Index extends Component
{
    public function render()
    {
        return view('livewire.reporting.index', [
            'projects' => Project::with(['tasks.manpowers'])->get()
        ]);
    }
}
