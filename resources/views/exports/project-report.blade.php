<!DOCTYPE html>
<html>
<head>
    <title>Report Project</title>
    <style>
        body { font-family: sans-serif; }
        h1, h2 { margin-bottom: 10px; }
        ul { margin: 0; padding: 0 0 0 20px; }
        li { margin-bottom: 6px; }
    </style>
</head>
<body>
    <h1>{{ $project->nama_project }}</h1>
    <p><strong>Deskripsi:</strong> {{ $project->deskripsi }}</p>
    <p><strong>Periode:</strong> {{ $project->tanggal_mulai }} s/d {{ $project->tanggal_selesai }}</p>

    <h2>Daftar Task</h2>
    <ul>
        @foreach ($project->tasks as $task)
            <li>
                <strong>{{ $task->judul_task }}</strong> ({{ $task->status }})
                <br>Man Power: {{ $task->manpowers->pluck('nama_lengkap')->implode(', ') }}
            </li>
        @endforeach
    </ul>
</body>
</html>
