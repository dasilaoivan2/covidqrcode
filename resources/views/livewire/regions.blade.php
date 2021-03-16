<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Regions') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Region
            </button>

            <input wire:model="searchToken" id="searchToken"
                   class="border-2 rounded-lg border-yellow-900 text-black-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                   type="text" placeholder="Search here...">

            @if($isOpen)
                @include('livewire.vaccinators.create')
            @endif

            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2 w-20">DB ID</th>
                    <th class="px-4 py-2">FullName</th>
                    <th class="px-4 py-2">Profession</th>
                    <th width="230px" class="px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>

                <?php $temp = 0;?>
                @foreach($vaccinators as $vaccinator)
                    <tr>
                        <?php $temp++;?>
                        <td class="border px-4 py-2">{{$temp}}</td>
                        <td class="border px-4 py-2">{{ $vaccinator->id}}</td>
                        <td class="border px-4 py-2">{{ $vaccinator->fullname() }}</td>
                        <td class="border px-4 py-2">{{ $vaccinator->profession }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $vaccinator->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">Edit
                            </button>

                            @if($confirming===$vaccinator->id)
                                <button wire:click="kill({{ $vaccinator->id }})"
                                        class="bg-red-800 text-white w-32 px-4 py-1 hover:bg-red-600 rounded border">
                                    Sure?
                                </button>
                            @else
                                <button wire:click="confirmDelete({{ $vaccinator->id }})"
                                        class="bg-gray-600 text-white w-32 px-4 py-1 hover:bg-red-600 rounded border">
                                    Delete
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $vaccinators->links() }}
        </div>
    </div>
</div>
