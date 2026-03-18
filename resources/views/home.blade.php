<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @foreach ($chirps as $chirps) {{-- É assim que se faz um comentário no blade, aliás, ali diz que para cada chirp no array, ela vai interagir com o que tiver abaixo --}}
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <div class="font-semibold">{{ $chirps['author'] }}</div>
                    <div class="mt-1">{{ $chirps['message'] }}</div>
                    <div class="text-sm text-gray-500 mt-2">{{ $chirps['time'] }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>


{{--

<h1 class="text-3xl font-bold">Welcome to Chirper!</h1>
<p class="mt-4 text-base-content/60">This is your brand new Laravel application. Time to make it
    sing (or chirp)!</p>
    <p class="mt-2 text-sm text-gray-600">Now this is on your GitHub! 🎉, por que estou fazendo tudo isso em inglês?"</p>
tava assim antes dentro daquele div dps do "card-body"
--}}