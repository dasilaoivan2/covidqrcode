<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Patients') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
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
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New
                    Patient
                </button>

                <input wire:model="searchToken" id="searchToken"
                       class="border-2 rounded-lg border-yellow-900 text-black-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                       type="text" placeholder="Search here...">


                @if($isCreate)
                    @include('livewire.patients.create')
                @endif


                <table class="table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2 w-20">DB ID</th>
                        <th class="px-4 py-2">Fullname</th>
                        <th class="px-4 py-2">Barangay</th>
                        <th width="260px" class="px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $temp = 0;?>
                    @foreach($patients as $patient)
                        <tr>
                            <?php $temp++;?>
                            <td class="border px-4 py-2">{{$temp}}</td>
                            <td class="border px-4 py-2">{{ $patient->id}}</td>
                            <td class="border px-4 py-2">{{ $patient->fullname() }}</td>
                            <td class="border px-4 py-2">{{ $patient->barangay->name }}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{ $patient->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                    Edit
                                </button>

                                @if($confirming===$patient->id)
                                    <button wire:click="kill({{ $patient->id }})"
                                            class="bg-red-800 text-white w-32 px-4 py-1 hover:bg-red-600 rounded border">
                                        Sure?
                                    </button>
                                @else
                                    <button wire:click="confirmDelete({{ $patient->id }})"
                                            class="bg-gray-600 text-white w-32 px-4 py-1 hover:bg-red-600 rounded border">
                                        Delete
                                    </button>
                                @endif

                                @if($patient->print == 1)
                                    <input type="checkbox"
                                           class="form-checkbox font-bolder rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200"
                                           wire:click="updatePrint({{$patient->id}},1)" checked>


                                @else
                                    <input type="checkbox"
                                           class="form-checkbox font-bolder rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200"
                                           wire:click="updatePrint({{$patient->id}},0)">

                                @endif


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $patients->links() }}
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                <div class="row">
                    <div class="col space-x-2">
                        <a href="{{ route('prints') }}" target="_blank" class="button bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded my-3">
                            Print
                        </a>

                        <button wire:click="clearPrintable()" wire:target="_blank"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Clear Printable
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        @include('livewire.tables.printtables')

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
