<div class="p-4">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-xl font-bold mb-2">
            {{ $projectId ? 'Edit Project' : 'Buat Project Baru' }}
        </h1>
        <hr class="pb-4">

        @if (session()->has('message'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">

            <div>
                <label for="nama_project" class="block font-medium text-gray-700">Nama Project</label>
                <input type="text" id="nama_project" wire:model.defer="nama_project"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                @error('nama_project')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="deskripsi" class="block font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" wire:model.defer="deskripsi" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                @error('deskripsi')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="tanggal_mulai" class="block font-medium text-gray-700">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" wire:model.defer="tanggal_mulai"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                @error('tanggal_mulai')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="tanggal_selesai" class="block font-medium text-gray-700">Tanggal Selesai</label>
                <input type="date" id="tanggal_selesai" wire:model.defer="tanggal_selesai"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                @error('tanggal_selesai')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Simpan
                </button>
                <a href="{{ route('projects.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
            </div>

        </form>
    </div>


</div>
