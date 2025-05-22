<div class="p-4">
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-xl font-bold mb-2">
            {{ $manPowerId ? 'Edit Man Power' : 'Buat Man Power Baru' }}
        </h1>
        <hr class="pb-4">

        @if (session()->has('message'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">

            <div>
                <label for="nama_lengkap" class="block font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" wire:model.defer="nama_lengkap"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                @error('nama_lengkap')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="jabatan" class="block font-medium text-gray-700">Jabatan</label>
                <input type="text" id="jabatan" wire:model.defer="jabatan"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                @error('jabatan')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="no_telepon" class="block font-medium text-gray-700">No Telepon</label>
                <input type="text" id="no_telepon" wire:model.defer="no_telepon"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                @error('no_telepon')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Simpan
                </button>
                <a href="{{ route('manpowers.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
            </div>

        </form>
    </div>
</div>
