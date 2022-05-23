<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
            <form method="POST" action="/admin/posts">
                @csrf
                <div class="form-group mb-6">
                    <label for="title">Title</label>
                    <input type="text" class="form-control border border-gray-400 p-2 w-full" value="{{ old('slug') }}" name="title" id="title"
                        aria-describedby="helpId" placeholder="title" required>
                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <label for="slug">slug</label>
                    <input value="{{ old('slug') }}" type="text" class="form-control border border-gray-400 p-2 w-full" name="slug" id="slug"
                        aria-describedby="helpId" placeholder="slug" required>
                    @error('slug')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <label for="excerpt">excerpt</label>
                    <textarea  class="form-control border border-gray-400 p-2 w-full" name="excerpt" id="excerpt"
                        aria-describedby="helpId" placeholder="excerpt" required>{{ old('slug') }}</textarea>
                    @error('excerpt')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">
                    <label for="body">body</label>
                    <textarea class="form-control border border-gray-400 p-2 w-full" name="body" id="body"
                        aria-describedby="helpId" placeholder="body" required>{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-6">

                    <select  class="form-control border border-gray-400 p-2 w-full" name="category_id" id="category_id"
                        aria-describedby="helpId" placeholder="body" required>
                    @php
                        $cats=\App\Models\Category::all();
                    @endphp
                    @foreach ($cats as $cat )
<option value="{{ $cat->id }}" {{ old('category_id')===$cat->id?'selecte':'' }}>{{ $cat->name }}</option>
                    @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                </div>
<x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>

    </section>
</x-layout>
