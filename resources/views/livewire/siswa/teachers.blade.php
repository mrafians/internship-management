<div class="flex h-auto w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex justify-between">
        <div>
            <flux:heading size="xl">Teachers List</flux:heading>
            <flux:text size="lg">Guru SIJA yang terdaftar di SMKN 2 Depok.</flux:text>
        </div>
    </div>
    
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <flux:modal name="teacher-details" class="w-144">
            <div class="space-y-4">
                <div>
                    <flux:heading size="lg">Details</flux:heading>
                    <flux:text class="mt-2">Informasi mengenai guru SIJA.</flux:text>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <flux:input label="Nama" placeholder="Empty" wire:model="nama" disabled />
                    <flux:input label="Email" type="email" placeholder="Empty" wire:model="email" disabled />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <flux:input label="NIP" mask="999999999999999999" placeholder="Empty" wire:model="nip" disabled />
                    <flux:input label="Kontak" mask="9999999999999" placeholder="Empty" wire:model="kontak" disabled />
                </div>
                <flux:textarea label="Alamat" resize="none" rows="3" wire:model="alamat" disabled />
                <flux:select label="Gender" placeholder="Select Gender" wire:model="gender" disabled>
                    <flux:select.option value="L">Laki-laki</flux:select.option>
                    <flux:select.option value="P">Perempuan</flux:select.option>
                </flux:select>
            </div>
        </flux:modal>

        <table class="w-full dark:text-gray-100">
            <thead class="dark:text-gray-100 uppercase">
                <tr class="bg-neutral-300 dark:bg-[#181818]">
                    <th class="px-2 py-2">Nama</th>
                    <th class="px-2 py-2">Email</th>
                    <th class="px-2 py-2">NIP</th>
                    <th class="px-2 py-2">Gender</th>
                    <th class="px-2 py-2">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                <tr class="border-t dark:border-[#555555] text-sm">
                    <td class="py-3 px-6">{{ $teacher->nama }}</td>
                    <td class="py-3 px-6">{{ $teacher->email }}</td>
                    <td class="py-3 px-6 text-center">{{ $teacher->nip }}</td>
                    <td class="py-3 px-6 text-center">@if ($teacher->gender == 'L') Laki-laki @elseif ($teacher->gender == 'P') Perempuan @endif</td>
                    <td class="py-2 px-3">
                        <div class="flex justify-center">
                            <flux:modal.trigger name="teacher-details">
                                <flux:button icon="ellipsis-horizontal" size="sm" wire:click="edit({{ $teacher->id }})" />
                            </flux:modal.trigger>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $teachers->links() }}
</div>