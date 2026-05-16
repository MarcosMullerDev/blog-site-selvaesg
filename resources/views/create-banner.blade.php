@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Criar Banner
</h1>

<form
    action="/store-banner"
    method="POST"
    enctype="multipart/form-data"
    class="flex flex-col gap-4"
>

    @csrf

    <input
        type="text"
        name="title"
        placeholder="Título"
        class="border p-3 rounded"
    >

    <input
        type="text"
        name="link"
        placeholder="Link"
        class="border p-3 rounded"
    >

    <input
        type="datetime-local"
        name="starts_at"
        class="border p-3 rounded"
    >

    <input
        type="datetime-local"
        name="ends_at"
        class="border p-3 rounded"
    >

    <input
        type="file"
        name="image"
        class="border p-3 rounded"
    >

    <label class="flex items-center gap-2">

        <input type="checkbox" name="active" value="1">

        Banner ativo

    </label>

    <button
        class="bg-black text-white p-3 rounded"
    >
        Salvar Banner
    </button>

</form>

@endsection