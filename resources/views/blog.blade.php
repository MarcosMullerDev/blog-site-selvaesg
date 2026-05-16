@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-24 px-6">

    <div class="mb-12">

        <p class="uppercase tracking-[6px] text-zinc-500 text-sm mb-4">
            Blog
        </p>

        <h1 class="text-6xl font-light mb-8">
            Todas as publicações
        </h1>

        <form action="/blog" method="GET" class="max-w-2xl">

            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar por título, tema, categoria..."
                class="w-full bg-white/70 border border-black/10 rounded-full px-6 py-4 focus:outline-none focus:bg-white transition"
            >

        </form>

    </div>

    <div class="flex flex-wrap gap-3 mb-16">

        <a
            href="/blog{{ request('search') ? '?search=' . request('search') : '' }}"
            class="px-6 py-3 rounded-full border transition
            {{ !request('category') ? 'bg-black text-white border-black' : 'bg-white/70 hover:bg-black hover:text-white' }}"
        >
            Todas
        </a>

        @foreach($categories as $category)

            <a
                href="/blog?category={{ urlencode($category) }}{{ request('search') ? '&search=' . request('search') : '' }}"
                class="px-6 py-3 rounded-full border transition
                {{ request('category') == $category ? 'bg-black text-white border-black' : 'bg-white/70 hover:bg-black hover:text-white' }}"
            >
                {{ $category }}
            </a>

        @endforeach

    </div>

    @if($posts->count())

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            @foreach($posts as $post)

                <a href="/post/{{ $post->slug }}" class="group block">

                    <article class="relative overflow-hidden rounded-[40px]">

                        <div class="h-[500px] overflow-hidden">

                            <img
                                src="{{ asset('storage/' . $post->cover_image) }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                            >

                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>

                        <div class="absolute bottom-0 left-0 p-10 text-white">

                            <p class="uppercase tracking-[5px] text-xs text-white/70 mb-4">
                                {{ $post->category }}
                            </p>

                            <h2 class="text-4xl font-light mb-4">
                                {{ $post->title }}
                            </h2>

                            <p class="text-white/80">
                                {{ $post->subtitle }}
                            </p>

                        </div>

                    </article>

                </a>

            @endforeach

        </div>

        <div class="mt-20">
            {{ $posts->links() }}
        </div>

    @else

        <div class="bg-white/70 rounded-[40px] p-12 text-center">
            <h2 class="text-3xl font-light mb-4">
                Nenhuma publicação encontrada.
            </h2>

            <a href="/blog" class="inline-flex mt-4 bg-black text-white px-8 py-4 rounded-full">
                Limpar filtros
            </a>
        </div>

    @endif

</div>

@endsection