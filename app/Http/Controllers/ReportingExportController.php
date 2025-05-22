<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportingExportController extends Controller
{
    public function exportPdf(Project $project)
    {
        $project->load('tasks.manpowers');

        $pdf = Pdf::loadView('exports.project-report', compact('project'));
        return $pdf->download("report_project_{$project->id}.pdf");
    }
}
