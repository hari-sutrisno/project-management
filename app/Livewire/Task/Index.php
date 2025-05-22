<?php

namespace App\Livewire\Task;

use Livewire\Component;
use App\Models\Task;

class Index extends Component
{
    public $tasks;

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $this->tasks = Task::with(['project', 'manPowers'])->latest()->get();
    }

    public function delete($id)
    {
        Task::findOrFail($id)->delete();

        session()->flash('message', 'Task berhasil dihapus.');
        $this->loadTasks();
    }

    public function render()
    {
        return view('livewire.task.index', [
            'tasks' => $this->tasks,
        ]);
    }
}
