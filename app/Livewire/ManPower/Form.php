<?php

namespace App\Livewire\ManPower;

use Livewire\Component;
use App\Models\ManPower;

class Form extends Component
{
    public $manPowerId = null;
    public $nama_lengkap = '';
    public $jabatan = '';
    public $no_telepon = '';

    public function mount($manPowerId = null)
    {
        if ($manPowerId) {
            $manPower = ManPower::find($manPowerId);
            if ($manPower) {
                $this->manPowerId = $manPower->id;
                $this->nama_lengkap = $manPower->nama_lengkap;
                $this->jabatan = $manPower->jabatan;
                $this->no_telepon = $manPower->no_telepon;
            }
        }
    }

    protected $rules = [
        'nama_lengkap' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'no_telepon' => 'required|numeric',
    ];

    public function save()
    {
        $this->validate();

        if ($this->manPowerId) {
            $manPower = ManPower::find($this->manPowerId);
        } else {
            $manPower = new ManPower();
        }

        $manPower->nama_lengkap = $this->nama_lengkap;
        $manPower->jabatan = $this->jabatan;
        $manPower->no_telepon = $this->no_telepon;
        $manPower->save();

        session()->flash('message', 'Man Power berhasil disimpan.');

        return redirect()->route('manpowers.index');
    }

    public function render()
    {
        return view('livewire.man-power.form');
    }
}
