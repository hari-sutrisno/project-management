<?php

namespace App\Livewire\Project;

use Livewire\Component;
use App\Models\Project;
use Carbon\Carbon;

class Form extends Component
{
    public $projectId = null;
    public $nama_project = '';
    public $deskripsi = '';
    public $tanggal_mulai = '';
    public $tanggal_selesai = '';

    public function mount($projectId = null)
    {
        if ($projectId) {
            $project = Project::find($projectId);

            if ($project) {
                $this->projectId = $project->id;
                $this->nama_project = $project->nama_project;
                $this->deskripsi = $project->deskripsi;
                $this->tanggal_mulai = $project->tanggal_mulai
                    ? Carbon::parse($project->tanggal_mulai)->format('Y-m-d')
                    : '';
                $this->tanggal_selesai = $project->tanggal_selesai
                    ? Carbon::parse($project->tanggal_selesai)->format('Y-m-d')
                    : '';
            }
        }
    }

    protected $rules = [
        'nama_project' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after:tanggal_mulai',
    ];

    public function save()
    {
        $this->validate();

        if ($this->projectId) {
            $project = Project::find($this->projectId);
        } else {
            $project = new Project();
        }

        $project->nama_project = $this->nama_project;
        $project->deskripsi = $this->deskripsi;
        $project->tanggal_mulai = $this->tanggal_mulai;
        $project->tanggal_selesai = $this->tanggal_selesai;

        $project->save();

        session()->flash('message', 'Project berhasil disimpan.');

        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.project.form');
    }
}
