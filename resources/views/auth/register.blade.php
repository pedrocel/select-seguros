<x-guest-layout>
    <form action="{{ route('admin.users.addStudent', $user) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-200 font-medium">Nome</label>
            <input type="text" name="name" id="name" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-200 font-medium">Email</label>
            <input type="email" name="email" id="email" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 dark:text-gray-200 font-medium">Senha</label>
            <input type="password" name="password" id="password" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
            @error('password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-200 font-medium">Confirme a Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="profile_id" class="block text-gray-700 dark:text-gray-200 font-medium">Perfil</label>
            <select name="profile_id" id="profile_id" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" required>
                @foreach($profiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                @endforeach
            </select>
            @error('profile_id')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                Salvar
            </button>
            <button type="button" id="cancelStudentModalButton" class="ml-4 text-gray-600 dark:text-gray-400 hover:underline">
                Cancelar
            </button>
        </div>
    </form>
</x-guest-layout>
