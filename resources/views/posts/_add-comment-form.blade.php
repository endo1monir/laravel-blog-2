@auth
<form action="/posts/{{ $post->slug }}/comments" method="POST">
    @csrf
    <header class="flex items-center">
        <img src="https://i.pravatar.cc/60?u=40" alt="" width="40" height="40"
            class="rounded-full">
        <h2 class="ml-4">want to participate ?</h2>
    </header>
    <div class="mt-6">
        <textarea name="body" class="
w-full text-sm focus:outline-none focus:ring"
            id="" placeholder="Quick thing something to say" cols="30" rows="10"></textarea>
        @error('body')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
    <x-submit-button>Post</x-submit-button>
    </div>

</form>
@else
<p>
    <a href="/register">Register </a> or <a href="/login">login</a> to leave a comment
</p>
@endauth
