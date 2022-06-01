<x-layout>
    <x-setting heading="Edit Post {{ $post->title }}">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input value="{{ $post->title }}" name="title" />
            <x-form.input name="slug" value="{{ $post->slug }}" />
            <x-form.input name="thumbnail" type="file" />
            <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="" class="rounded-xl">

            <x-form.textarea name="excerpt" value="{{ $post->excerpt }}" />
            <x-form.textarea name="body" value="{{ $post->body }}" />
            <x-form.field>
                <select class="form-control border border-gray-400 p-2 w-full" name="category_id" id="category_id"
                    aria-describedby="helpId" placeholder="body" required>
                    @php
                        $cats = \App\Models\Category::all();
                    @endphp
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}" {{ $post->category_id === $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}</option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </x-form.field>
            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting>
    </x-layout>
