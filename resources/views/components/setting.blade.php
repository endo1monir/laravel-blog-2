@props(['heading'])
<section class="px-6 py-8" mx-auto max-w-sm>
    <h1 class="text-lg font-bold mb-6 pb-6 border-b">{{ $heading }}</h1>


    <div class="flex">
        <aside class="w-48">
<ul>
    <li><a href="{{ route('admin.posts.index') }}">All Posts</a></li>
    <li><a href="/admin/posts/create" class="{{ request()->is('admin/posts/create')? 'text-blue-500':'' }}">New post</a></li>

</ul>
        </aside>
        <main class="flex-1">
             <x-panel class="max-w-sm mx-auto">
{{ $slot }}
    </x-panel>
        </main>
    </div>


</section>
