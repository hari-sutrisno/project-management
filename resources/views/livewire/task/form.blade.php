<div class="p-4 max-w-2xl mx-auto">
    <h1 class="text-xl font-bold mb-4">
        {{ $taskId ? 'Edit Task' : 'Buat Task Baru' }}
    </h1>

    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label for="judul_task" class="block font-medium text-gray-700">Judul Task</label>
            <input type="text" id="judul_task" wire:model.defer="judul_task"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
            @error('judul_task')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="project_id" class="block font-medium text-gray-700">Project</label>
            <select id="project_id" wire:model.defer="project_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="">-- Pilih Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->nama_project }}</option>
                @endforeach
            </select>
            @error('project_id')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-1">Man Power</label>
            <div class="space-y-1 max-h-48 overflow-y-auto border rounded p-2">
                @foreach ($manpowers as $manpower)
                    <label class="inline-flex items-center pe-4">
                        <input type="checkbox" wire:model.defer="selectedManPowers" value="{{ $manpower->id }}"
                            class="form-checkbox" />
                        <span class="ml-2">{{ $manpower->nama_lengkap }} ({{ $manpower->jabatan }})</span>
                    </label>
                @endforeach
            </div>
            @error('selectedManPowers')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="status" class="block font-medium text-gray-700">Status</label>
            <select id="status" wire:model.defer="status"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Done">Done</option>
            </select>
            @error('status')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Simpan
            </button>
            <a href="{{ route('tasks.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
