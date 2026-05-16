@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-24 px-6">

    <!-- HEADER -->

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-16">

        <div>

            <p class="uppercase tracking-[6px] text-zinc-500 text-sm mb-4">
                Gerenciamento
            </p>

            <h1 class="text-6xl font-light">
                Sobre o Selva
            </h1>

        </div>

    </div>

    <!-- FORM CRIAR -->

    <form
        action="/about/store"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white rounded-[40px] shadow-2xl p-10 md:p-14 flex flex-col gap-8 mb-20"
    >

        @csrf

        <!-- TÍTULO -->

        <div>

            <label class="block mb-4 uppercase tracking-[4px] text-sm text-zinc-500">

                Título

            </label>

            <input
                type="text"
                name="title"
                placeholder="Digite o título"
                class="w-full border border-zinc-300 rounded-2xl p-5 text-xl"
            >

        </div>

        <!-- TEXTO -->

        <div>

            <label class="block mb-4 uppercase tracking-[4px] text-sm text-zinc-500">

                Texto

            </label>

            <textarea
                id="editor"
                name="text"
                rows="8"
                class="w-full border border-zinc-300 rounded-2xl p-5"
            ></textarea>

        </div>

        <!-- IMAGENS -->

        <div class="grid lg:grid-cols-2 gap-8">

            <div>

                <label class="block mb-4 uppercase tracking-[4px] text-sm text-zinc-500">

                    Imagem Principal

                </label>

                <input
                    type="file"
                    name="image"
                    class="w-full border border-zinc-300 rounded-2xl p-5"
                >

            </div>

            <div>

                <label class="block mb-4 uppercase tracking-[4px] text-sm text-zinc-500">

                    Segunda Imagem

                </label>

                <input
                    type="file"
                    name="secondary_image"
                    class="w-full border border-zinc-300 rounded-2xl p-5"
                >

            </div>

        </div>

        <!-- STATUS -->

        <label class="flex items-center gap-4">

            <input
                type="checkbox"
                name="active"
                value="1"
                class="w-5 h-5"
            >

            <span class="text-lg">
                Ativar esse sobre
            </span>

        </label>

        <!-- BOTÃO -->

        <button
            class="bg-black hover:bg-zinc-800 text-white p-5 rounded-2xl transition duration-300"
        >
            Salvar Sobre
        </button>

    </form>

    <!-- LISTAGEM -->

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-10">

        @foreach($abouts as $about)

            <div class="bg-white rounded-[40px] shadow-2xl overflow-hidden">

                <!-- IMAGENS -->

                <div class="grid grid-cols-2 gap-2 p-2">

                    @if($about->image)

                        <img
                            src="{{ asset('storage/' . $about->image) }}"
                            class="w-full h-72 object-cover rounded-[30px]"
                        >

                    @endif

                    @if($about->secondary_image)

                        <img
                            src="{{ asset('storage/' . $about->secondary_image) }}"
                            class="w-full h-72 object-cover rounded-[30px]"
                        >

                    @endif

                </div>

                <!-- CONTEÚDO -->

                <div class="p-8">

                    <div class="flex justify-between items-center mb-6">

                        <h2 class="text-3xl font-light">

                            {{ $about->title }}

                        </h2>

                        @if($about->active)

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">

                                Ativo

                            </span>

                        @endif

                    </div>

                    <div class="prose max-w-none text-zinc-700 mb-8">

                        {!! $about->text !!}

                    </div>

                    <!-- BOTÕES -->

                    <div class="flex flex-wrap gap-4">

                        <a
                            href="/about/edit/{{ $about->id }}"
                            class="bg-black text-white px-6 py-3 rounded-2xl"
                        >
                            Editar
                        </a>

                        <form
                            action="/about/toggle/{{ $about->id }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')

                            <button
                                class="bg-zinc-200 px-6 py-3 rounded-2xl"
                            >
                                Ativar
                            </button>

                        </form>

                        <form
                            action="/about/delete/{{ $about->id }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-500 text-white px-6 py-3 rounded-2xl"
                            >
                                Excluir
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

<!-- CKEDITOR -->

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {

            console.error(error);

        });

</script>

@endsection