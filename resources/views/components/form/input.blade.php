@props(['name','type'=>'text'])
<x-form.field>
<x-form.label name="{{ $name }}"/>
    <input type="{{ $type }}" class="form-control border border-gray-400 p-2 w-full" value="{{ old($name) }}" name="{{ $name }}" id="{{ $name }}"
        aria-describedby="helpId" placeholder="{{ $name }}" required>
    <x-form.error name="{{ $name }}"/>
</x-form.field>
