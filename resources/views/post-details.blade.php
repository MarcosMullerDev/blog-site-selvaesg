@extends('layouts.app')

@section('content')

<!-- HERO -->

<section class="relative h-[90vh] rounded-[40px] overflow-hidden">

    <!-- IMAGEM -->

    <img
        src="{{ asset('storage/' . $post->cover_image) }}"
        class="absolute inset-0 w-full h-full object-cover"
    >

    <!-- OVERLAY -->

    <div class="absolute inset-0 bg-black/60"></div>

    <!-- CONTEÚDO -->

    <div class="relative z-10 h-full flex items-end">

        <div class="p-10 md:p-20 max-w-5xl">

            <!-- CATEGORIA -->

            <p class="uppercase tracking-[8px] text-white/70 text-sm mb-6">

                {{ $post->category }}

            </p>

            <!-- TÍTULO -->

            <h1 class="text-white text-5xl md:text-7xl font-light leading-tight mb-8">

                {{ $post->title }}

            </h1>

            <!-- SUBTITLE -->

            <p class="text-white/80 text-xl md:text-2xl leading-relaxed max-w-3xl">

                {{ $post->subtitle }}

            </p>

            <!-- INFO -->

            <div class="flex flex-wrap items-center gap-6 mt-10 text-white/70">

                <span>
                    Por {{ $post->author }}
                </span>

                <span>
                    •
                </span>

                <span>
                    {{ $post->created_at->format('d/m/Y') }}
                </span>

            </div>

        </div>

    </div>

</section>

<!-- CONTEÚDO -->

<section class="max-w-4xl mx-auto py-24">

    <article class="prose prose-lg max-w-none">

        {!! $post->content !!}

    </article>

</section>

<!-- SHARE -->

<section class="max-w-4xl mx-auto mb-24">

    <div class="border-t border-zinc-300 pt-10">

        <h3 class="text-2xl font-bold mb-6">

            Compartilhar artigo

        </h3>

        <div class="flex gap-4">

            <a
                href="https://twitter.com/intent/tweet?url={{ url()->current() }}"
                target="_blank"
                class="bg-black text-white px-6 py-3 rounded-full"
            >
                Twitter
            </a>

            <a
                href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                target="_blank"
                class="bg-blue-600 text-white px-6 py-3 rounded-full"
            >
                Linkedin
            </a>

        </div>

    </div>

</section>

<!-- COMENTÁRIOS -->

<section class="max-w-4xl mx-auto mb-24">

    <h2 class="text-4xl font-light mb-12">

        Comentários

    </h2>

    <!-- FORM -->

    <form
        action="/comment/{{ $post->id }}"
        method="POST"
        class="bg-white rounded-[40px] p-10 shadow mb-16"
    >

        @csrf

        <div class="grid md:grid-cols-2 gap-6 mb-6">

            <input
                type="text"
                name="name"
                placeholder="Seu nome"
                class="rounded-2xl border-zinc-300"
                required
            >

        </div>

        <textarea
            name="comment"
            rows="6"
            placeholder="Seu comentário"
            class="w-full rounded-2xl border-zinc-300 mb-6"
            required
        ></textarea>

        <button
            class="bg-black text-white px-8 py-4 rounded-full"
        >
            Enviar comentário
        </button>

    </form>

    <!-- LISTA -->

    <div class="space-y-8">

        @foreach($comments as $comment)

            <div class="bg-white rounded-[30px] p-8 shadow">

                <div class="flex items-center justify-between mb-4">

                    <h3 class="text-2xl font-bold">

                        {{ $comment->name }}

                    </h3>

                    <span class="text-zinc-500 text-sm">

                        {{ $comment->created_at->format('d/m/Y') }}

                    </span>

                </div>

                <p class="text-zinc-700 leading-relaxed text-lg">

                    {{ $comment->comment }}

                </p>

            </div>

        @endforeach

    </div>

</section>

<!-- RELATED POSTS -->

@if($relatedPosts->count())

<section class="mb-20">

    <div class="flex justify-between items-center mb-12">

        <h2 class="text-5xl font-light">

            Continue lendo

        </h2>

    </div>

    <div class="grid md:grid-cols-3 gap-8">

        @foreach($relatedPosts as $related)

            <a
                href="/post/{{ $related->slug }}"
                class="group block"
            >

                <article class="relative overflow-hidden rounded-[30px]">

                    <div class="h-[450px] overflow-hidden">

                        <img
                            src="{{ asset('storage/' . $related->cover_image) }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                        >

                    </div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                    <div class="absolute bottom-0 p-8 text-white">

                        <p class="uppercase tracking-[5px] text-xs text-white/70 mb-4">

                            {{ $related->category }}

                        </p>

                        <h3 class="text-3xl font-light leading-tight">

                            {{ $related->title }}

                        </h3>

                    </div>

                </article>

            </a>

        @endforeach

    </div>

</section>

@endif

@endsection