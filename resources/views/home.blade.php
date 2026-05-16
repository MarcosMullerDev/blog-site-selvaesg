@extends('layouts.app')

@section('content')

@if($banners->count())

<section
    x-data="{
        activeSlide: 0,
        totalSlides: {{ $banners->count() }},

        next() {
            this.activeSlide =
                (this.activeSlide + 1) % this.totalSlides
        },

        prev() {
            this.activeSlide =
                (this.activeSlide - 1 + this.totalSlides)
                % this.totalSlides
        },

        startAutoSlide() {

            setInterval(() => {

                this.next()

            }, 5000)

        }
    }"

    x-init="startAutoSlide()"

    class="relative h-[75vh] overflow-hidden bg-black rounded-[40px]"
>

    @foreach($banners as $index => $banner)

        <div
            x-show="activeSlide === {{ $index }}"
            x-transition.opacity.duration.1000ms
            class="absolute inset-0"
        >

            <!-- IMAGENS -->

            <div class="relative h-full">
                <img
                    src="{{ asset('storage/' . $banner->image) }}"
                    class="w-full h-full object-cover"
                >
            </div>

            <!-- OVERLAY -->

            <div class="absolute inset-0 bg-black/50"></div>

            <!-- CONTEÚDO -->

            <div class="absolute inset-0 flex items-center">

                <div class="max-w-7xl px-8 md:px-20">

                    <div class="max-w-4xl">

                        <p class="uppercase tracking-[8px] text-white/70 text-sm mb-6 hero-fade-up">

                            Selva ESG

                        </p>

                        <h1 class="text-white text-4xl md:text-6xl font-light leading-tight mb-8 hero-fade-up-delay-1">

                            {{ $banner->title }}

                        </h1>

                        <p class="text-white/80 text-lg md:text-2xl leading-relaxed mb-10 max-w-2xl hero-fade-up-delay-2">

                            Conteúdo, sustentabilidade,
                            inovação e impacto positivo
                            para transformar pessoas
                            e negócios.

                        </p>

                        <a
                            href="{{ $banner->link }}"
                            target="_blank"
                            class="inline-flex bg-white text-black px-8 py-4 rounded-full text-lg hover:scale-105 transition duration-500 hero-fade-up-delay-3"
                        >

                            Explorar conteúdo

                        </a>

                    </div>

                </div>

            </div>

        </div>

    @endforeach

    <!-- BOTÃO ESQUERDA -->

    <button
    id="teamLeftButton"
    onclick="scrollTeam(-1)"
    class="hidden absolute left-0 top-1/2 -translate-y-1/2 z-20 bg-black/40 hover:bg-black/70 text-white w-12 h-12 rounded-full backdrop-blur-md transition"
    >
        ←
    </button>

    <!-- BOTÃO DIREITA -->

    <button
    id="teamRightButton"
    onclick="scrollTeam(1)"
    class="hidden absolute right-0 top-1/2 -translate-y-1/2 z-20 bg-black/40 hover:bg-black/70 text-white w-12 h-12 rounded-full backdrop-blur-md transition"
    >
        →
    </button>

    <!-- DOTS -->

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-30 flex gap-3">

        @foreach($banners as $index => $banner)

            <button
                @click="activeSlide = {{ $index }}"
                class="transition-all duration-500 rounded-full"
                :class="
                    activeSlide === {{ $index }}
                    ? 'w-10 h-3 bg-white'
                    : 'w-3 h-3 bg-white/40'
                "
            ></button>

        @endforeach

    </div>

    <!-- SCROLL -->

    <div class="absolute bottom-10 right-10 z-30 hidden md:flex flex-col items-center gap-4 text-white/70">

        <span class="uppercase tracking-[5px] text-xs rotate-90">
            Scroll
        </span>

        <div class="w-[1px] h-24 bg-white/30 relative overflow-hidden">

            <div class="absolute top-0 left-0 w-full h-10 bg-white scroll-line"></div>

        </div>

    </div>

</section>

@endif

@if($about)

<section class="py-32">

    <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- IMAGEM -->

            <div class="relative h-[650px] flex items-center justify-center">

        <!-- IMAGEM FUNDO -->

        @if($about->secondary_image)

            <img
                src="{{ asset('storage/' . $about->secondary_image) }}"
                class="absolute top-0 left-0 w-[75%] h-[500px] object-cover rounded-[40px] shadow-2xl opacity-90"
            >

        @endif

        <!-- IMAGEM FRENTE -->

        <img
            src="{{ asset('storage/' . $about->image) }}"
            class="absolute bottom-0 right-0 w-[75%] h-[500px] object-cover rounded-[40px] shadow-[0_20px_80px_rgba(0,0,0,0.25)] border-8 border-white"
        >

    </div>

        <!-- TEXTO -->

        <div class="max-w-2xl">

            <!-- LABEL -->

            <p class="uppercase tracking-[8px] text-zinc-500 text-sm mb-8">

                Sobre o projeto

            </p>

            <!-- TÍTULO -->

            <h2 class="text-5xl md:text-6xl font-light leading-tight mb-10">

                {{ $about->title }}

            </h2>

            <!-- TEXTO -->

            <div class="text-zinc-700 text-xl leading-relaxed space-y-6">

                {!! $about->text !!}

            </div>

            <!-- LINHA -->

            <div class="w-32 h-[2px] bg-black mt-12"></div>

        </div>

    </div>

</section>

@endif

<div class="flex justify-between items-center mb-12 mt-24">

    <h1 class="text-4xl font-bold">
        Últimos Posts
    </h1>

</div>

<div class="relative mt-12">

    <!-- SETA ESQUERDA -->

    <button
        id="postsLeftButton"
        onclick="scrollPosts(-1)"
        class="hidden absolute left-0 top-1/2 -translate-y-1/2 z-20 bg-black/40 hover:bg-black/70 text-white w-12 h-12 rounded-full backdrop-blur-md transition"
    >
        ←
    </button>

    <!-- SETA DIREITA -->

    <button
        id="postsRightButton"
        onclick="scrollPosts(1)"
        class="hidden absolute right-0 top-1/2 -translate-y-1/2 z-20 bg-black/40 hover:bg-black/70 text-white w-12 h-12 rounded-full backdrop-blur-md transition"
    >
        →
    </button>

    <!-- WRAPPER -->

    <div
        id="postsWrapper"
        class="overflow-hidden"
    >

        <!-- CARROSSEL -->

        <div
            id="postsCarousel"
            class="flex gap-8 overflow-x-auto scroll-smooth no-scrollbar w-fit mx-auto pb-4"
        >

            @foreach($posts as $post)

                <a
                    href="/post/{{ $post->slug }}"
                    class="group block flex-shrink-0 w-[420px]"
                >

                    <article
                        class="relative overflow-hidden rounded-[36px]"
                    >

                        <!-- IMAGEM -->

                        <div class="h-[520px] overflow-hidden">

                            <img
                                src="{{ asset('storage/' . $post->cover_image) }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition duration-700"
                            >

                        </div>

                        <!-- OVERLAY -->

                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

                        <!-- CONTEÚDO -->

                        <div class="absolute bottom-0 left-0 p-8 text-white">

                            <p class="uppercase tracking-[6px] text-sm text-white/70 mb-4">

                                {{ $post->category }}

                            </p>

                            <h2 class="text-3xl leading-tight font-light mb-5">

                                {{ $post->title }}

                            </h2>

                            <p class="text-white/80 leading-relaxed mb-6">

                                {{ $post->subtitle }}

                            </p>

                            <span class="inline-flex items-center gap-3 text-lg">

                                Ler matéria

                                <span class="text-2xl">
                                    →
                                </span>

                            </span>

                        </div>

                    </article>

                </a>

            @endforeach

        </div>

    </div>

</div>

<div class="flex justify-center mt-16">

    <a
        href="/blog"
        class="bg-black text-white px-8 py-4 rounded-full hover:scale-105 transition duration-500"
    >
        Ver mais publicações
    </a>

</div>

@if($members->count())

<section class="mt-32">

    <!-- TOPO -->

    <div class="flex items-end justify-between mb-14">

            <div>

                <p class="uppercase tracking-[8px] text-zinc-500 text-sm mb-4">

                    Time Selva

                </p>

                <h2 class="text-5xl md:text-6xl font-light leading-tight">

                    Quem Faz o Selva

                </h2>

            </div>

        </div>

        <!-- GRID -->

        <div class="relative">

        <!-- BOTÃO ESQUERDA -->

        <button
            onclick="scrollTeam(-1)"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-20 bg-black/40 hover:bg-black/70 text-white w-12 h-12 rounded-full backdrop-blur-md transition"
        >
            ←
        </button>

        <!-- BOTÃO DIREITA -->

        <button
            onclick="scrollTeam(1)"
            class="absolute right-0 top-1/2 -translate-y-1/2 z-20 bg-black/40 hover:bg-black/70 text-white w-12 h-12 rounded-full backdrop-blur-md transition"
        >
            →
        </button>

        <!-- CARROSSEL -->

    <div id="teamWrapper" class="overflow-hidden">

            <div
                id="teamCarousel" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4 no-scrollbar w-fit mx-auto">

                @foreach($members as $member)

                    <div
                        class="min-w-[340px] max-w-[340px] bg-white rounded-[32px] p-5 flex gap-5 items-center shadow-md snap-start flex-shrink-0"
                    >

                        <!-- FOTO -->

                        <img
                            src="{{ asset('storage/' . $member->image) }}"
                            alt="{{ $member->name }}"
                            class="w-28 h-28 rounded-3xl object-cover"
                        >

                        <!-- INFO -->

                        <div class="flex-1">

                            <h3 class="text-2xl font-semibold mb-2">

                                {{ $member->name }}

                            </h3>

                            <p class="text-[#7A5C48] text-sm mb-4 leading-relaxed">

                                {{ $member->role }}

                            </p>

                            <!-- REDES -->

                            <div class="flex items-center gap-4">

                                @if($member->instagram)

                                    <a
                                        href="{{ $member->instagram }}"
                                        target="_blank"
                                        class="hover:scale-110 transition"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-[#E1306C]" viewBox="0 0 24 24">
                                            <path d="M7.8 2h8.4A5.8 5.8 0 0 1 22 7.8v8.4A5.8 5.8 0 0 1 16.2 22H7.8A5.8 5.8 0 0 1 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2Zm0 2A3.8 3.8 0 0 0 4 7.8v8.4A3.8 3.8 0 0 0 7.8 20h8.4a3.8 3.8 0 0 0 3.8-3.8V7.8A3.8 3.8 0 0 0 16.2 4Zm8.95 1.5a1.15 1.15 0 1 1-1.15 1.15 1.15 1.15 0 0 1 1.15-1.15ZM12 7a5 5 0 1 1-5 5 5 5 0 0 1 5-5Zm0 2a3 3 0 1 0 3 3 3 3 0 0 0-3-3Z"/>
                                        </svg>
                                    </a>

                                @endif

                                @if($member->linkedin)

                                    <a
                                        href="{{ $member->linkedin }}"
                                        target="_blank"
                                        class="hover:scale-110 transition"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-[#0A66C2]" viewBox="0 0 24 24">
                                            <path d="M4.98 3.5A2.48 2.48 0 1 1 2.5 5.98 2.48 2.48 0 0 1 4.98 3.5ZM3 8h4v13H3Zm7 0h3.8v1.8h.05A4.17 4.17 0 0 1 17.6 7.5c4 0 4.75 2.63 4.75 6V21h-4v-6.1c0-1.46 0-3.33-2-3.33s-2.3 1.58-2.3 3.22V21h-4Z"/>
                                        </svg>
                                    </a>

                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>
    </div>

</section>

@endif

<style>

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

</style>

<script>

    const teamCarousel =
        document.getElementById('teamCarousel')

    const leftButton =
        document.getElementById('teamLeftButton')

    const rightButton =
        document.getElementById('teamRightButton')

    function updateCarouselButtons() {

        if (!teamCarousel) return

        const hasOverflow =
            teamCarousel.scrollWidth >
            teamWrapper.clientWidth + 20

        if (hasOverflow) {

            leftButton.classList.remove('hidden')
            rightButton.classList.remove('hidden')

            teamCarousel.classList.remove('mx-auto')

        } else {

            leftButton.classList.add('hidden')
            rightButton.classList.add('hidden')

            // CENTRALIZA QUANDO NÃO TEM OVERFLOW

            teamCarousel.classList.add('mx-auto')

        }

    }

    function scrollTeam(direction) {

        const cardWidth = 370

        teamCarousel.scrollBy({

            left: direction * cardWidth,
            behavior: 'smooth'

        })

    }

    // AUTO SLIDE

    setInterval(() => {

        if (!teamCarousel) return

        const maxScroll =
            teamCarousel.scrollWidth -
            teamCarousel.clientWidth

        if (
            teamCarousel.scrollLeft >=
            maxScroll - 10
        ) {

            teamCarousel.scrollTo({

                left: 0,
                behavior: 'smooth'

            })

        } else {

            scrollTeam(1)

        }

    }, 4500)

    // INIT

    window.addEventListener('load', () => {

        updateCarouselButtons()

    })

    window.addEventListener('resize', () => {

        updateCarouselButtons()

    })

</script>

<footer class="mt-40 bg-[#B89B84] text-white rounded-t-[50px] overflow-hidden">

    <div class="max-w-7xl mx-auto px-8 md:px-16 py-24">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- ESQUERDA -->

            <div>

                <p class="uppercase tracking-[8px] text-white/60 text-sm mb-6">

                    Selva ESG

                </p>

                <h2 class="text-5xl md:text-6xl font-light leading-tight mb-8">

                    Transformando conteúdo
                    em impacto positivo.

                </h2>

                <p class="text-white/70 text-xl leading-relaxed max-w-2xl">

                    Um portal sobre ESG, sustentabilidade,
                    inovação e transformação de negócios
                    para pessoas que querem construir
                    um futuro melhor.

                </p>

            </div>

            <!-- DIREITA -->

            <div class="flex flex-col lg:items-end gap-8">

                <a
                    href="/"
                    class="text-2xl hover:translate-x-2 transition"
                >
                    Home
                </a>

                <a
                    href="/blog"
                    class="text-2xl hover:translate-x-2 transition"
                >
                    Blog
                </a>

                <a
                    href="https://instagram.com"
                    target="_blank"
                    class="text-2xl hover:translate-x-2 transition"
                >
                    Instagram
                </a>

                <a
                    href="https://linkedin.com"
                    target="_blank"
                    class="text-2xl hover:translate-x-2 transition"
                >
                    LinkedIn
                </a>

                <a
                    href="https://spotify.com"
                    target="_blank"
                    class="text-2xl hover:translate-x-2 transition"
                >
                    Spotify
                </a>

            </div>

        </div>

        <!-- LINHA -->

        <div class="w-full h-[1px] bg-white/10 my-16"></div>

        <!-- BOTTOM -->

        <div class="flex flex-col md:flex-row justify-between gap-6 text-white/50">

            <p>
                © 2026 Selva ESG. Todos os direitos reservados.
            </p>

            <p>
                Conteúdo, inovação e sustentabilidade.
            </p>

        </div>

    </div>

</footer>

<script>

    const postsCarousel =
        document.getElementById('postsCarousel')

    const postsWrapper =
        document.getElementById('postsWrapper')

    const postsLeftButton =
        document.getElementById('postsLeftButton')

    const postsRightButton =
        document.getElementById('postsRightButton')

    function updatePostsButtons() {

        if (!postsCarousel) return

        const hasOverflow =
            postsCarousel.scrollWidth >
            postsWrapper.clientWidth + 20

        if (hasOverflow) {

            postsLeftButton.classList.remove('hidden')
            postsRightButton.classList.remove('hidden')

        } else {

            postsLeftButton.classList.add('hidden')
            postsRightButton.classList.add('hidden')

        }

    }

    function scrollPosts(direction) {

        const cardWidth = 450

        postsCarousel.scrollBy({

            left: direction * cardWidth,
            behavior: 'smooth'

        })

    }

    // AUTO SLIDE

    setInterval(() => {

        if (!postsCarousel) return

        const maxScroll =
            postsCarousel.scrollWidth -
            postsCarousel.clientWidth

        if (
            postsCarousel.scrollLeft >=
            maxScroll - 10
        ) {

            postsCarousel.scrollTo({

                left: 0,
                behavior: 'smooth'

            })

        } else {

            scrollPosts(1)

        }

    }, 5000)

    window.addEventListener('load', () => {

        updatePostsButtons()

    })

    window.addEventListener('resize', () => {

        updatePostsButtons()

    })

</script>
@endsection