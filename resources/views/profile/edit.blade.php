<x-layout>
    <x-slot:title>
        Edit Profile
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 bg-base-100">
                <div class="card-body">

                    <h1 class="text-xl mt-1 font-bold text-center mb-6">
                        Edit Profile
                    </h1>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <label class="floating-label mb-6">
                            <input type="text" name="name"
                                value="{{ old('name', $user->name) }}"
                                class="input input-bordered @error('name') input-error @enderror" required>
                            <span>Name</span>
                        </label>
                        @error('name')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Bio -->
                        <label class="floating-label mb-6">
                            <textarea name="bio"
                                class="textarea textarea-bordered @error('bio') textarea-error @enderror"
                                placeholder="Tell something about yourself...">{{ old('bio', $user->bio) }}</textarea>
                            <span>Bio</span>
                        </label>
                        @error('bio')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Avatar Preview -->
                        <div class="flex justify-center mb-4">
                            <img
                                src="{{ $user->avatar 
                                    ? asset('storage/' . $user->avatar) 
                                    : 'https://avatars.laravel.cloud/' . urlencode($user->email) }}"
                                class="w-20 h-20 rounded-full object-cover">
                        </div>

                        <!-- Avatar Upload -->
                        <div class="mb-6">
                            <input type="file" name="avatar"
                                class="file-input file-input-bordered w-full @error('avatar') file-input-error @enderror">
                        </div>
                        @error('avatar')
                            <div class="label -mt-4 mb-2">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Submit -->
                        <div class="form-control mt-6">
                            <button type="submit" class="btn btn-primary btn-sm w-full">
                                Salvar alterações
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-layout>
