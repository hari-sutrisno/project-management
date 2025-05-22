<?php

namespace App\Livewire\ManPower;

use Livewire\Component;
use App\Models\ManPower;

class Index extends Component
{
    public $manpowers;

    public function mount()
    {
        $this->loadManPowers();
    }

    public function loadManPowers()
    {
        $this->manpowers = ManPower::latest()->get();
    }

    public function delete($id)
    {
        $manPower = ManPower::findOrFail($id);
        $manPower->delete();

        session()->flash('message', 'Man Power berhasil dihapus.');
        $this->loadManPowers();
    }

    public function render()
    {
        return view('livewire.man-power.index', [
            'manpowers' => $this->manpowers,
        ]);
    }
}
