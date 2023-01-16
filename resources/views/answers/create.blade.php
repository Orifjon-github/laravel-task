<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class='flex items-center'>
                        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                            <div class='max-w-md mx-auto space-y-6'>

                                <form action="{{route('answers.store', ['application' => $application->id])}}" method="POST">
                                    @csrf
                                    <h2 class="text-2xl font-bold ">Answer application #{{$application->id}}</h2>
                                    <hr class="my-6">
                                    <label class="uppercase text-sm font-bold opacity-70">Answer</label>
                                    <textarea rows="5" type="text" required name="body"
                                              class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none"></textarea>

                                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded font-medium mx-3 hover:bg-green-600 transition duration-200 each-in-out">Submit</button>
                                    <a href="{{route('dashboard')}}" class="bg-red-500 text-white px-6 py-2 rounded font-medium mx-3 hover:bg-red-600 transition duration-200 each-in-out">Cancel</a>

                                </form>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
