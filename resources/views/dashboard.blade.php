<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dairy Journal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Sebuah website yang dirancang untuk membantu individu dalam mengembangkan kebiasaan refleksi, kesadaran diri,
                    dan pertumbuhan pribadi. Website ini menyediakan beberapa fitur sebagai alat ideal yang bisa memenuhi dan
                    membantu pengguna dalam meningkatkan kesejahteraan mental dan emosional serta meningkatkan produktivitas.") }}
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" onclick="location.href='{{ route('notes.index') }}';" style="cursor: pointer;">
                    <div class="card-body text-center">
                        <i class="icon" style="font-size: 2rem;">📝</i>
                        <h5 class="card-title mt-2">Notes</h5>
                    </div>
                </div>
            </div>
            
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" onclick="location.href='{{ route('user-challenges.index') }}';" style="cursor: pointer;">
                    <div class="card-body text-center">
                        <i class="icon" style="font-size: 2rem;">🏆</i>
                        <h5 class="card-title mt-2">Challenge</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm" onclick="location.href='{{ route('todos.index') }}';" style="cursor: pointer;">
                    <div class="card-body text-center">
                        <i class="icon" style="font-size: 2rem;">✅</i>
                        <h5 class="card-title mt-2">To-Do</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
