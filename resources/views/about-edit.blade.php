@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto py-24 px-6">

    <!-- HEADER -->

    <div class="mb-16">

        <p class="uppercase tracking-[6px] text-zinc-500 text-sm mb-4">
            Gerenciamento
        </p>

        <h1 class="text-6xl font-light leading-tight">
            Editar Sobre
        </h1>

    </div>

    <!-- FORM -->

    <form
        action="/about/update/{{ $about->id }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white rounded-[40px] shadow-2xl overflow-hidden"
    >

        @csrf
        @method('PUT')

        <div class="p-10 md:p-14 flex flex-col gap-10">

            <!-- TÍTULO -->

            <div>

                <label class="block mb-4 text-sm uppercase tracking-[4px] text-zinc-500">

                    Título

                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ $about->title }}"
                    class="w-full border border-zinc-300 rounded-2xl p-5 text-xl focus:ring-2 focus:ring-black focus:outline-none"
                >

            </div>

            <!-- TEXTO -->

            <div>

                <label class="block mb-4 text-sm uppercase tracking-[4px] text-zinc-500">

                    Texto

                </label>

                <textarea
                    id="editor"
                    name="text"
                    rows="10"
                    class="w-full border border-zinc-300 rounded-2xl p-5"
                >{!! $about->text !!}</textarea>

            </div>

            <!-- IMAGENS -->

            <div class="grid lg:grid-cols-2 gap-10">

                <!-- IMAGEM PRINCIPAL -->

                <div>

                    <label class="block mb-4 text-sm uppercase tracking-[4px] text-zinc-500">

                        Imagem Principal

                    </label>

                    @if($about->image)

                        <img
                            src="{{ asset('storage/' . $about->image) }}"
                            class="w-full h-[320px] object-cover rounded-[30px] shadow-xl mb-6"
                        >

                    @endif

                    <input
                        type="file"
                        name="image"
                        class="w-full border border-zinc-300 rounded-2xl p-5"
                    >

                </div>

                <!-- SEGUNDA IMAGEM -->

                <div>

                    <label class="block mb-4 text-sm uppercase tracking-[4px] text-zinc-500">

                        Segunda Imagem

                    </label>

                    @if($about->secondary_image)

                        <img
                            src="{{ asset('storage/' . $about->secondary_image) }}"
                            class="w-full h-[320px] object-cover rounded-[30px] shadow-xl mb-6"
                        >

                    @endif

                    <input
                        type="file"
                        name="secondary_image"
                        class="w-full border border-zinc-300 rounded-2xl p-5"
                    >

                </div>

            </div>

            <!-- STATUS -->

            <div class="flex items-center gap-4">

                <input
                    type="checkbox"
                    name="active"
                    value="1"
                    class="w-5 h-5"
                    {{ $about->active ? 'checked' : '' }}
                >

                <span class="text-lg">
                    Ativar esse sobre
                </span>

            </div>

            <!-- BOTÕES -->

            <div class="flex flex-wrap gap-4 pt-6">

                <button
                    class="bg-black hover:bg-zinc-800 text-white px-8 py-4 rounded-2xl transition duration-300"
                >
                    Atualizar Sobre
                </button>

                <a
                    href="/about"
                    class="border border-zinc-300 hover:bg-zinc-100 px-8 py-4 rounded-2xl transition duration-300"
                >
                    Voltar
                </a>

            </div>

        </div>

    </form>

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