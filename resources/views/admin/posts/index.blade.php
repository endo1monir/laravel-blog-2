<x-layout>
    <x-setting heading="Posts">

        <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
            <div class="py-8">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">

                            <tbody>
                        @foreach ($posts as $post )
    <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">

                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                 <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden="true"
                                                class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                            </span>
                                            <span class="relative">
                                                Publish
                                            </span>
                                        </span>
                                    </td>

                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-blue-900 whitespace-no-wrap">
                                            <a href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                                        </p>
                                    </td>

                                </tr>
                        @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-setting>
</x-layout>
