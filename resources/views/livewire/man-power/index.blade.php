<div class="p-4">
    <h1 class="text-xl font-bold mb-2">Daftar Man Power</h1>
    <hr class="pb-4">

    @if (session()->has('message'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <a href="{{ route('manpowers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        + Tambah Man Power
    </a>

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-300">
                <th class="border px-2 py-1">#</th>
                <th class="border px-2 py-1">Nama Lengkap</th>
                <th class="border px-2 py-1">Jabatan</th>
                <th class="border px-2 py-1">No Telepon</th>
                <th class="border px-2 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($manpowers as $index => $manpower)
                <tr>
                    <td class="border px-2 py-1">{{ $index + 1 }}</td>
                    <td class="border px-2 py-1">{{ $manpower->nama_lengkap }}</td>
                    <td class="border px-2 py-1">{{ $manpower->jabatan }}</td>
                    <td class="border px-2 py-1">{{ $manpower->no_telepon }}</td>
                    <td class="border px-2 py-1">
                        <a href="{{ route('manpowers.edit', $manpower->id) }}" class="text-blue-500">Edit</a>
                        <button wire:click="delete({{ $manpower->id }})" class="text-red-500 ml-2">Hapus</button>
                    </td>
                </tr>
            @endforeach

            @if ($manpowers->isEmpty())
                <tr>
                    <td colspan="5" class="text-center py-2">Belum ada man power.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
