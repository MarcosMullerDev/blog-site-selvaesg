@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-6">
    Editar Banner
</h1>

<form
    action="/banner/update/{{ $banner->id }}"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col gap-4"
>

    @csrf
    @method('PUT')

    <input
        type="text"
        name="title"
        value="{{ $banner->title }}"
        class="border p-3 rounded"
    >

    <input
        type="text"
        name="link"
        value="{{ $banner->link }}"
        class="border p-3 rounded"
    >

    <input
        type="datetime-local"
        name="starts_at"
        value="{{ $banner->starts_at }}"
        class="border p-3 rounded"
    >

    <input
        type="datetime-local"
        name="ends_at"
        value="{{ $banner->ends_at }}"
        class="border p-3 rounded"
    >

    <img
        src="{{ asset('storage/' . $banner->image) }}"
        class="w-64 rounded"
    >

    <input
        type="file"
        name="image"
        class="border p-3 rounded"
    >

    <label class="flex items-center gap-2">

        <input
            type="checkbox"
            name="active"
            value="1"
            {{ $banner->active ? 'checked' : '' }}
        >

        Banner ativo

    </label>

    <button
        class="bg-black text-white p-3 rounded"
    >
        Atualizar Banner
    </button>

</form>

@endsection