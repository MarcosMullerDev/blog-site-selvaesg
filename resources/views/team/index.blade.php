@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-6">
    Quem Faz o Selva
</h1>

<form
    action="/team/store"
    method="POST"
    enctype="multipart/form-data"
    class="bg-white p-6 rounded-2xl shadow flex flex-col gap-4 mb-10"
>

    @csrf

    <input
        type="text"
        name="name"
        placeholder="Nome"
        class="border p-3 rounded"
    >

    <textarea
        id="editor"
        name="text"
        rows="5"
        placeholder="Descrição"
        class="border p-3 rounded"
    ></textarea>

    <input
        type="text"
        name="instagram"
        placeholder="Instagram URL"
        class="border p-3 rounded"
    >

    <input
        type="text"
        name="linkedin"
        placeholder="Linkedin URL"
        class="border p-3 rounded"
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
            checked
        >

        Ativo

    </label>

    <button
        class="bg-black text-white p-3 rounded-xl"
    >
        Salvar Pessoa
    </button>

</form>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    @foreach($members as $member)

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <img
                src="{{ asset('storage/' . $member->image) }}"
                class="w-full h-64 object-cover"
            >

            <div class="p-5">

                <div class="flex justify-between items-center mb-4">

                    <h2 class="text-2xl font-bold">

                        {{ $member->name }}

                    </h2>

                    @if($member->active)

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Ativo
                        </span>

                    @endif

                </div>

                <p class="text-zinc-700 mb-5">

                    {!! $member->text !!}

                </p>

                <div class="flex gap-3 mb-5">

                    @if($member->instagram)

                        <a
                            href="{{ $member->instagram }}"
                            target="_blank"
                            class="text-pink-500"
                        >
                            Instagram
                        </a>

                    @endif

                    @if($member->linkedin)

                        <a
                            href="{{ $member->linkedin }}"
                            target="_blank"
                            class="text-blue-600"
                        >
                            Linkedin
                        </a>

                    @endif

                </div>

                <div class="flex gap-2">

                    <form
                        action="/team/toggle/{{ $member->id }}"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            class="bg-zinc-700 text-white px-4 py-2 rounded-lg"
                        >

                            @if($member->active)

                                Desativar

                            @else

                                Ativar

                            @endif

                        </button>

                    </form>

                    <form
                        action="/team/delete/{{ $member->id }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-lg"
                        >
                            Excluir
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

</div>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection