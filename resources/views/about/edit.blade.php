@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-16">

    <!-- HEADER -->

    <div class="mb-12">

        <p class="uppercase tracking-[6px] text-zinc-500 text-sm mb-4">
            Gerenciamento
        </p>

        <h1 class="text-5xl font-light">
            Sobre o Selva
        </h1>

    </div>

    <!-- FORM -->

    <form
        action="/about/store"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white p-10 rounded-[40px] shadow-xl flex flex-col gap-6 mb-16"
    >

        @csrf

        <!-- TÍTULO -->

        <div>

            <label class="block mb-3 font-semibold text-zinc-700">
                Título
            </label>

            <input
                type="text"
                name="title"
                placeholder="Digite o título"
                class="w-full border border-zinc-300 rounded-2xl p-4 focus:ring-2 focus:ring-black"
            >

        </div>

        <!-- TEXTO -->

        <div>

            <label class="block mb-3 font-semibold text-zinc-700">
                Texto
            </label>

            <textarea
                id="editor"
                name="text"
                rows="8"
                placeholder="Digite o texto"
                class="w-full border border-zinc-300 rounded-2xl p-4"
            ></textarea>

        </div>

        <!-- IMAGENS -->

        <div class="grid md:grid-cols-2 gap-6">

            <!-- IMAGEM PRINCIPAL -->

            <div>

                <label class="block mb-3 font-semibold text-zinc-700">
                    Imagem principal
                </label>

                <input
                    type="file"
                    name="image"
                    class="w-full border border-zinc-300 rounded-2xl p-4"
                >

            </div>

            <!-- SEGUNDA IMAGEM -->

            <div>

                <label class="block mb-3 font-semibold text-zinc-700">
                    Segunda imagem
                </label>

                <input
                    type="file"
                    name="secondary_image"
                    class="w-full border border-zinc-300 rounded-2xl p-4"
                >

            </div>

        </div>

        <!-- STATUS -->

        <label class="flex items-center gap-3 text-lg">

            <input
                type="checkbox"
                name="active"
                value="1"
                class="w-5 h-5"
            >

            Ativar esse sobre

        </label>

        <!-- BOTÃO -->

        <button
            class="bg-black hover:bg-zinc-800 text-white p-4 rounded-2xl transition duration-300"
        >
            Salvar Sobre
        </button>

    </form>

    <!-- LISTAGEM -->

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

        @foreach($abouts as $about)

            <div class="bg-white rounded-[40px] shadow-xl overflow-hidden">

                <!-- IMAGENS -->

                <div class="relative h-[350px] bg-zinc-100">

                    @if($about->secondary_image)

                        <img
                            src="{{ asset('storage/' . $about->secondary_image) }}"
                            class="absolute top-6 left-6 w-[60%] h-[250px] object-cover rounded-[30px] shadow-xl"
                        >

                    @endif

                    @if($about->image)

                        <img
                            src="{{ asset('storage/' . $about->image) }}"
                            class="absolute bottom-6 right-6 w-[60%] h-[250px] object-cover rounded-[30px] border-8 border-white shadow-2xl"
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

                    <div class="text-zinc-700 leading-relaxed mb-8 line-clamp-4">

                        {!! $about->text !!}

                    </div>

                    <!-- BOTÕES -->

                    <div class="flex flex-wrap gap-3">

                        <a
                            href="/about/{{ $about->id }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-3 rounded-2xl transition"
                        >
                            Ver
                        </a>

                        <a
                            href="/about/edit/{{ $about->id }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-2xl transition"
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
                                class="bg-zinc-800 hover:bg-black text-white px-5 py-3 rounded-2xl transition"
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
                                class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-2xl transition"
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