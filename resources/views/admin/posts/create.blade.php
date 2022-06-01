<x-layout>
<x-setting heading="Publish Post">
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title" />
        <x-form.input name="slug" />
        <x-form.input name="thumbnail" type="file" />
        <x-form.textarea name="excerpt" />
        <x-form.textarea name="body" />
        <x-form.field>
            <select class="form-control border border-gray-400 p-2 w-full" name="category_id" id="category_id"
                aria-describedby="helpId" placeholder="body" required>
                @php
                    $cats = \App\Models\Category::all();
                @endphp
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') === $cat->id ? 'selecte' : '' }}>
                        {{ $cat->name }}</option>
                @endforeach
            </select>
            <x-form.error name="category" />
        </x-form.field>
        <x-submit-button>Publish</x-submit-button>
    </form>
</x-setting>
</x-layout>
