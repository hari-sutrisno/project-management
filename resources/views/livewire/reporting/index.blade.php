<div class="p-4">
    <h1 class="text-xl font-bold mb-4">Reporting</h1>

    @foreach ($projects as $project)
        <div class="border rounded p-4 mb-4 bg-white">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-lg font-semibold">{{ $project->nama_project }}</h2>
                <a href="{{ route('reporting.export.pdf', $project->id) }}" target="_blank"
                    class="text-sm text-white bg-indigo-600 px-3 py-1 rounded">Export PDF</a>
            </div>
            <p class="mb-2">{{ $project->deskripsi }}</p>
            <p class="text-sm text-gray-600 mb-2">
                Tanggal: {{ $project->tanggal_mulai }} s/d {{ $project->tanggal_selesai }}
            </p>

            <h3 class="font-semibold mt-4">Daftar Task:</h3>
            <ul class="list-disc list-inside">
                @foreach ($project->tasks as $task)
                    <li class="mb-2">
                        <div>
                            <strong>{{ $task->judul_task }}</strong>
                            <span class="text-xs text-gray-600">({{ $task->status }})</span>
                        </div>
                        <div class="text-sm">
                            Man Power:
                            {{ $task->manpowers->pluck('nama_lengkap')->implode(', ') }}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
