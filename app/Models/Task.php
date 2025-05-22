<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'judul_task',
        'deskripsi',
        'project_id',
        'status'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function manPowers()
    {
        return $this->belongsToMany(ManPower::class, 'man_power_task');
    }
}
