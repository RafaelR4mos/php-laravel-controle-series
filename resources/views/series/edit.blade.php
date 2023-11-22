<x-layout title="Editar série - {{ $series->name }}">
    <x-series.form
        action="{{ route('series.update', $series->id) }}"
        name="{{ $series->name }}"
        btnTitle="Editar série"
        update="true"
    />
</x-layout>
