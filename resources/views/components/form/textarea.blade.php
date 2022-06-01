@props(['name','value'])
<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea class="form-control border border-gray-400 p-2 w-full" name="{{ $name }}" id="{{ $name }}"
        aria-describedby="helpId" placeholder="{{ $name }}" required>{{ $value }}</textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
