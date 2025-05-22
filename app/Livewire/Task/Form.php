<?php

namespace App\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;
use App\Models\ManPower;

class Form extends Component
{
    public $taskId = null;
    public $judul_task = '';
    public $deskripsi = '';
    public $project_id = null;
    public $selectedManPowers = [];

    public $projects = [];
    public $manpowers = [];

    public $status = 'Pending';

    public function mount($taskId = null)
    {
        $this->projects = Project::all();
        $this->manpowers = ManPower::all();

        if ($taskId) {
            $task = Task::find($taskId);
            if ($task) {
                $this->taskId = $task->id;
                $this->judul_task = $task->judul_task;
                $this->deskripsi = $task->deskripsi;
                $this->project_id = $task->project_id;
                $this->selectedManPowers = $task->manPowers()->pluck('man_power_id')->toArray();
                $this->status = $task->status;
            }
        }
    }

    protected $rules = [
        'judul_task' => 'required|string|max:255',
        'project_id' => 'required|exists:projects,id',
        'selectedManPowers' => 'required|array|min:1',
        'selectedManPowers.*' => 'exists:man_powers,id',
        'status' => 'required|in:Pending,In Progress,Done',
    ];

    public function save()
    {
        $this->validate();

        if ($this->taskId) {
            $task = Task::findOrFail($this->taskId);
        } else {
            $task = new Task();
        }

        $task->judul_task = $this->judul_task;
        $task->deskripsi = $this->deskripsi;
        $task->project_id = $this->project_id;
        $task->status = $this->status;

        $task->save();

        // Sync manpowers
        $task->manPowers()->sync($this->selectedManPowers);

        session()->flash('message', 'Task berhasil disimpan.');

        return redirect()->route('tasks.index');
    }

    public function render()
    {
        return view('livewire.task.form')->layout('layouts.app');
    }
}
