<div class="p-4">
    <h1 class="text-xl font-bold mb-2">Daftar Project</h1>
    <hr class="pb-4">

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+
        Tambah Project</a>

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-300">
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">Nama</th>
                <th class="border px-2 py-1">Tanggal</th>
                <th class="border px-2 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($projects as $index => $project)
                <tr>
                    <td class="border px-2 py-1">{{ $index + 1 }}</td>
                    <td class="border px-2 py-1">{{ $project->nama_project }}</td>
                    <td class="border px-2 py-1">
                        {{ $project->tanggal_mulai }} → {{ $project->tanggal_selesai }}
                    </td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('projects.edit', $project) }}" class="text-blue-500">Edit</a>
                        <button wire:click="delete({{ $project->id }})" class="text-red-500 ml-2">Hapus</button>
                    </td>
                </tr>
            @endforeach

            @if ($projects->isEmpty())
                <tr>
                    <td colspan="4" class="text-center py-2">Belum ada project.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
