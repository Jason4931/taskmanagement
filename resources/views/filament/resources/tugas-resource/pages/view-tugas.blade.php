<x-filament-panels::page>
  <div class="space-y-4 p-6 bg-white rounded-lg border-2 border-gray-200 shadow-md">
    <h1 class="text-2xl font-bold text-center">
      {{ $this->record->nama_tugas }}
    </h1>
    <p><strong>Deskripsi:</strong> {{ $this->record->deskripsi }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $this->record->tanggal_mulai }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $this->record->tanggal_selesai }}</p>
    <p><strong>Status:</strong> {{ ucfirst($this->record->status) }}</p>
    <p><strong>Proyek:</strong> {{ $this->record->proyek->nama_proyek }}</p>
    <p><strong>User:</strong> {{ $this->record->user->name }}</p>
  </div>
</x-filament-panels::page>