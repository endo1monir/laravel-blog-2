<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register">
               @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        name
                    </label>
                    <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full" required>
                </div>
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        username
                    </label>
                    <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full" required>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        email
                    </label>
                    <input type="text" name="email" id="email" class="border border-gray-400 p-2 w-full" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                    </label>
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full" required>
                </div>
                <div class="mb-6">
<button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
    submit
</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>