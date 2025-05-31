<div class="flex h-auto w-full flex-1 flex-col gap-4 rounded-xl">
    <div class="flex justify-between">
        <div>
            <flux:heading size="xl">Industries List</flux:heading>
            <flux:text size="lg">List industri yang ada di Indonesia.</flux:text>
        </div>
    </div>
    
    <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
        <flux:modal name="industry-details" class="w-144">
            <div class="space-y-4">
                <div>
                    <flux:heading size="lg">Details</flux:heading>
                    <flux:text class="mt-2">Informasi tentang perusahaan ini.</flux:text>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <flux:input label="Nama" placeholder="Empty" wire:model="nama" disabled />
                    <flux:input label="Email" type="email" placeholder="Empty" wire:model="email" disabled />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <flux:input label="Website" placeholder="Empty" wire:model="website" disabled />
                    <flux:input label="Kontak" mask="9999999999999" placeholder="Empty" wire:model="kontak" disabled />
                </div>
                <flux:textarea label="Bidang Usaha" resize="none" rows="2" wire:model="bidang_usaha" disabled />
                <flux:textarea label="Alamat" resize="none" rows="3" wire:model="alamat" disabled />
            </div>
        </flux:modal>
        
        <table class="w-full dark:text-gray-100">
            <thead class="dark:text-gray-100 uppercase">
                <tr class="bg-neutral-300 dark:bg-[#181818]">
                    <th class="px-2 py-2">Nama</th>
                    <th class="px-2 py-2">Email</th>
                    <th class="px-2 py-2">Kontak</th>
                    <th class="px-2 py-2">Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($industries as $industry)
                <tr class="border-t dark:border-[#555555] text-sm">
                    <td class="py-3 px-6">{{ $industry->nama }}</td>
                    <td class="py-3 px-6">{{ $industry->email }}</td>
                    <td class="py-3 px-6 text-center">{{ $industry->kontak }}</td>
                    <td class="py-2 px-3">
                        <div class="flex justify-center">
                            <flux:modal.trigger name="industry-details">
                                <flux:button icon="ellipsis-horizontal" size="sm" wire:click="edit({{ $industry->id }})" />
                            </flux:modal.trigger>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $industries->links() }}
</div>