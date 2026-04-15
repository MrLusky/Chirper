<x-layout>
    <x-slot:title>
        Buscar Usuários
    </x-slot:title>

    <div class="max-w-2xl mx-auto">

        <!-- Busca -->
        <form method="GET" action="{{ route('users.index') }}" class="mb-6">
            <input 
                type="text" 
                name="search" 
                value="{{ $search }}"
                placeholder="Buscar usuários..."
                class="input input-bordered w-full"
            >
        </form>

        <!-- Lista -->
        <div class="space-y-4">

            @forelse ($users as $user)
                <div class="card bg-base-100">
                    <div class="card-body flex flex-row items-center justify-between">

                        <div class="flex items-center gap-3">

                            <img
                                src="{{ $user->avatar 
                                    ? asset('storage/' . $user->avatar) 
                                    : 'https://avatars.laravel.cloud/' . urlencode($user->email) }}"
                                class="w-10 h-10 rounded-full">

                            <span class="font-semibold">
                                {{ $user->name }}
                            </span>

                        </div>

                        @auth
                            @if (auth()->id() !== $user->id)

                                <form action="{{ route('users.follow', $user) }}" method="POST">
                                    @csrf

                                    @if (auth()->user()->following->contains($user))
                                        @method('DELETE')
                                        <button class="btn btn-ghost btn-xs">
                                            Deixar de seguir
                                        </button>
                                    @else
                                        <button class="btn btn-ghost btn-xs">
                                            Seguir
                                        </button>
                                    @endif

                                </form>

                            @endif
                        @endauth

                    </div>
                </div>

            @empty
                <p class="text-center text-base-content/60">
                    Nenhum usuário encontrado.
                </p>
            @endforelse

        </div>
    </div>
</x-layout>
