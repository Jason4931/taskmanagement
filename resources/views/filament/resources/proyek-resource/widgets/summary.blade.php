<x-filament::card class="w-full">
  <div class="text-lg font-semibold mb-4">Jumlah Tugas</div>
  <div class="flex w-full justify-between text-center">
    <div class="flex-1">
      <div class="text-gray-500">To Do</div>
      <div class="text-2xl font-bold">{{ $toDo }}</div>
    </div>
    <div class="flex-1">
      <div class="text-gray-500">In Progress</div>
      <div class="text-2xl font-bold">{{ $inProgress }}</div>
    </div>
    <div class="flex-1">
      <div class="text-gray-500">Done</div>
      <div class="text-2xl font-bold">{{ $done }}</div>
    </div>
  </div>
</x-filament::card>