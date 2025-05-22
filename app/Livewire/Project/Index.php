<?php

namespace App\Livewire\Project;

use Livewire\Component;
use App\Models\Project;

class Index extends Component
{
    public $projects;

    public function mount()
    {
        $this->loadProjects();
    }

    public function loadProjects()
    {
        $this->projects = Project::latest()->get();
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        session()->flash('message', 'Project berhasil dihapus.');
        $this->loadProjects();
    }

    public function render()
    {
        return view('livewire.project.index', [
            'projects' => $this->projects,
        ]);
    }
}
