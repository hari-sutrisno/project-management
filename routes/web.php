<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Livewire\Project\Index as ProjectIndex;
use App\Livewire\Project\Form as ProjectForm;
use App\Livewire\ManPower\Index as ManPowerIndex;
use App\Livewire\ManPower\Form as ManPowerForm;
use App\Livewire\Task\Index as TaskIndex;
use App\Livewire\Task\Form as TaskForm;
use App\Livewire\Reporting\Index;
use App\Http\Controllers\ReportingExportController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/projects', ProjectIndex::class)->name('projects.index');
    Route::get('/projects/create', ProjectForm::class)->name('projects.create');
    Route::get('/projects/{projectId}/edit', ProjectForm::class)->name('projects.edit');

    Route::get('/manpowers', ManPowerIndex::class)->name('manpowers.index');
    Route::get('/manpowers/create', ManPowerForm::class)->name('manpowers.create');
    Route::get('/manpowers/{manPowerId}/edit', ManPowerForm::class)->name('manpowers.edit');

    Route::get('/tasks', TaskIndex::class)->name('tasks.index');
    Route::get('/tasks/create', TaskForm::class)->name('tasks.create');
    Route::get('/tasks/{taskId}/edit', TaskForm::class)->name('tasks.edit');

    Route::get('/reporting', Index::class)->name('reporting.index');
    Route::get('/reporting/export/{project}', [ReportingExportController::class, 'exportPdf'])->name('reporting.export.pdf');
});

require __DIR__.'/auth.php';
