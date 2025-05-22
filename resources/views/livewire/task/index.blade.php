<div class="p-4">
    <h1 class="text-xl font-bold mb-2">Daftar Task</h1>
    <hr class="mb-4">

    @if(session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-600">
       + Tambah Task
    </a>

    <table class="w-full table-auto border border-gray-300">
        <thead>
            <tr class="bg-gray-300">
                <th class="border px-3 py-2">#</th>
                <th class="border px-3 py-2">Judul Task</th>
                <th class="border px-3 py-2">Project</th>
                <th class="border px-3 py-2">Man Power</th>
                <th class="border px-2 py-1">Status</th>
                <th class="border px-3 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($tasks as $index => $task)
                <tr>
                    <td class="border px-3 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border px-3 py-2">{{ $task->judul_task }}</td>
                    <td class="border px-3 py-2">{{ $task->project->nama_project ?? '-' }}</td>
                    <td class="border px-3 py-2">
                        @foreach($task->manPowers as $mp)
                            <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded mr-1 mb-1">
                                {{ $mp->nama_lengkap }}
                            </span>
                        @endforeach
                    </td>
                    <td class="border px-2 py-1">{{ $task->status }}</td>
                    <td class="border px-3 py-2">
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:underline">Edit</a>
                        <button wire:click="delete({{ $task->id }})"
                                class="text-red-500 ml-3 hover:underline"
                                onclick="confirm('Yakin hapus task ini?') || event.stopImmediatePropagation()">
                            Hapus
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Belum ada task.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
