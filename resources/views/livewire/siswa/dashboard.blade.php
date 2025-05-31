<div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex justify-between">
        <div>
            <flux:heading size="xl">Laporan PKL</flux:heading>
            <flux:text size="lg">Laporan Program Kerja Lapangan yang kamu ajukan.</flux:text>
        </div>
        
        <div class="flex self-end gap-2">
            @if (!$internships)
            <flux:modal.trigger name="add-intern">
                <flux:button wire:click="resetInputFields()">Tambah</flux:button>
            </flux:modal.trigger>
            @else
            <div class="grid grid-cols-2 gap-2">
                <flux:modal.trigger name="edit-intern">
                    <flux:button variant="primary" wire:click="edit()">Edit</flux:button>
                </flux:modal.trigger>
        
                <flux:button variant="danger" wire:click="delete()">Hapus</flux:button>
            </div>
            @endif
        </div>
    </div>

    <div class="grid auto-rows-min gap-4 md:grid-cols-2">
        <div class="relative px-6 py-4 aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            @if (!$internships)
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            @else
            <flux:heading size="xl">Guru</flux:heading>
            <flux:text size="lg">Nama: {{ $internships->guru->nama ?? '-' }}</flux:text>
            <flux:text size="lg">Email: {{ $internships->guru->email ?? '-' }}</flux:text>
            <flux:text size="lg">NIP: {{ $internships->guru->nip ?? '-' }}</flux:text>
            @endif
        </div>
        <div class="relative px-6 py-4 aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            @if (!$internships)
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            @else
            <flux:heading size="xl">Industri</flux:heading>
            <flux:text size="lg">Nama: {{ $internships->industri->nama ?? '-' }}</flux:text>
            <flux:text size="lg">Email: {{ $internships->industri->email ?? '-' }}</flux:text>
            <flux:text size="lg">Bidang Usaha: {{ $internships->industri->bidang_usaha ?? '-' }}</flux:text>
            <flux:text size="lg">Alamat: {{ $internships->industri->alamat ?? '-' }}</flux:text>
            @endif
        </div>
    </div>
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <flux:modal name="add-intern" class="w-144">
            <div class="space-y-4">
                <div>
                    <flux:heading size="lg">Pengajuan PKL</flux:heading>
                    <flux:text class="mt-2">Tambah laporan pengajuan PKL.</flux:text>
                </div>
                <flux:select placeholder="Select Siswa" wire:model="siswa_id" required disabled hidden>
                    @foreach ($daftarSiswa as $siswa)
                    <flux:select.option value="{{ $siswa->id }}">{{ $siswa->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:select label="Guru" placeholder="Select Guru" wire:model="guru_id" required>
                    @foreach ($daftarGuru as $guru)
                    <flux:select.option value="{{ $guru->id }}">{{ $guru->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:select label="Industri" placeholder="Select Industry" wire:model="industri_id" required>
                    @foreach ($daftarIndustri as $industri)
                    <flux:select.option value="{{ $industri->id }}">{{ $industri->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
                <div class="grid grid-cols-2 gap-3">
                    <flux:input type="date" label="Mulai" wire:model="mulai" />
                    <flux:input type="date" label="Selesai" wire:model="selesai" />
                </div>
                <flux:button variant="primary" class="w-full" wire:click.prevent="store()">Tambah</flux:button>
            </div>
        </flux:modal>

        <flux:modal name="edit-intern" class="w-144">
            <div class="space-y-4">
                <div>
                    <flux:heading size="lg">Pengajuan PKL</flux:heading>
                    <flux:text class="mt-2">Edit laporan pengajuan PKL.</flux:text>
                </div>
                <flux:input type="hidden" wire:model="intern_id" />
                <flux:select wire:model="siswa_id" required disabled hidden>
                    @foreach ($daftarSiswa as $siswa)
                    <flux:select.option value="{{ $siswa->id }}">{{ $siswa->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:select label="Guru" placeholder="Select Guru" wire:model="guru_id" required>
                    @foreach ($daftarGuru as $guru)
                    <flux:select.option value="{{ $guru->id }}">{{ $guru->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:select label="Industri" placeholder="Select Industry" wire:model="industri_id" required>
                    @foreach ($daftarIndustri as $industri)
                    <flux:select.option value="{{ $industri->id }}">{{ $industri->nama }}</flux:select.option>
                    @endforeach
                </flux:select>
                <div class="grid grid-cols-2 gap-3">
                    <flux:input type="date" label="Mulai" wire:model="mulai" />
                    <flux:input type="date" label="Selesai" wire:model="selesai" />
                </div>
                <flux:button variant="primary" class="w-full" wire:click.prevent="update()">Simpan</flux:button>
            </div>
        </flux:modal>


        <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
    </div>
</div>