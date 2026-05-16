@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-10">

        <h1 class="text-6xl font-black mb-4">
            Criar Novo Post
        </h1>

        <p class="text-zinc-600 text-xl">
            Publique conteúdos institucionais do Selva.
        </p>

    </div>

    <form
        action="/store-post"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white rounded-3xl shadow p-10 flex flex-col gap-8"
    >

        @csrf

        {{-- CAPA --}}

        <div>

            <label class="block text-xl font-bold mb-3">

                Imagem de Capa

            </label>

            <input
                type="file"
                name="cover_image"
                class="border p-4 rounded-2xl w-full"
            >

        </div>

        {{-- TÍTULO --}}

        <div>

            <label class="block text-xl font-bold mb-3">

                Título

            </label>

            <input
                type="text"
                name="title"
                class="border p-4 rounded-2xl w-full text-2xl"
                placeholder="Digite o título do post"
            >

        </div>

        {{-- SUBTÍTULO --}}

        <div>

            <label class="block text-xl font-bold mb-3">

                Subtítulo

            </label>

            <input
                type="text"
                name="subtitle"
                class="border p-4 rounded-2xl w-full"
                placeholder="Subtítulo"
            >

        </div>

        {{-- AUTOR --}}

        <div>

            <label class="block text-xl font-bold mb-3">

                Autor

            </label>

            <input
                type="text"
                name="author"
                class="border p-4 rounded-2xl w-full"
                placeholder="Autor"
            >

        </div>

        {{-- CATEGORIA --}}

        <div>

            <label class="block text-xl font-bold mb-3">

                Categoria

            </label>

            <input
                type="text"
                name="category"
                class="border p-4 rounded-2xl w-full"
                placeholder="Categoria"
            >

        </div>

        {{-- TAGS --}}

        <div>

            <label class="block text-xl font-bold mb-3">

                Tags

            </label>

            <input
                type="text"
                name="tags"
                class="border p-4 rounded-2xl w-full"
                placeholder="ESG, sustentabilidade, inovação..."
            >

        </div>

        {{-- CONTEÚDO --}}

        <div>

            <label class="block text-xl font-bold mb-3">

                Conteúdo

            </label>

            <textarea
                id="editor"
                name="content"
                rows="15"
                class="border p-5 rounded-2xl w-full"
            ></textarea>

        </div>

        {{-- DESTAQUE --}}

        <label class="flex items-center gap-3 text-lg">

            <input
                type="checkbox"
                name="featured"
                value="1"
                class="w-5 h-5"
            >

            Post em destaque

        </label>

        {{-- BOTÃO --}}

        <button
            class="bg-black text-white text-xl p-5 rounded-2xl hover:scale-105 transition"
        >
            Publicar Post
        </button>

    </form>

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