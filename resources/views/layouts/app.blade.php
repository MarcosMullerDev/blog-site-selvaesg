<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Selva ESG')</title>

    <meta
        name="description"
        content="@yield('description', 'Conteúdo sobre ESG, sustentabilidade, inovação e transformação de negócios.')"
    >

    <link rel="canonical" href="{{ url()->current() }}">

    <meta property="og:title" content="@yield('title', 'Selva ESG')">
    <meta property="og:description" content="@yield('description', 'Conteúdo sobre ESG, sustentabilidade, inovação e transformação de negócios.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('image', asset('images/og-selva.jpg'))">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Selva ESG')">
    <meta name="twitter:description" content="@yield('description', 'Conteúdo sobre ESG, sustentabilidade, inovação e transformação de negócios.')">
    <meta name="twitter:image" content="@yield('image', asset('images/og-selva.jpg'))">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-[#ECE8DC] text-[#3B2B22] overflow-x-hidden">

    <!-- LOADER -->

    <div
        x-data="{ showLoader: true }"
        x-init="
            document.body.style.overflow = 'hidden';

            setTimeout(() => {

                showLoader = false;

                document.body.style.overflow = '';

            }, 1200)
        "
    >

        <div
            x-show="showLoader"
            x-transition:leave="transition ease-in-out duration-700"
            x-transition:leave-start="opacity-100 blur-0"
            x-transition:leave-end="opacity-0 blur-sm"
            class="fixed inset-0 z-[9999] bg-[#111111] flex items-center justify-center overflow-hidden"
        >

            <!-- GRAIN -->

            <div class="absolute inset-0 opacity-[0.04] loader-grain"></div>

            <!-- CONTENT -->

            <div class="relative z-10 text-center">

                <p
                    class="uppercase tracking-[12px]
                        text-white/50 text-sm mb-6
                        animate-pulse"
                >
                    Selva ESG
                </p>

                <h1
                    class="text-white text-5xl md:text-7xl
                        font-light tracking-[10px]"
                >
                    SELVA
                </h1>

            </div>

        </div>

    </div>

    <header class="fixed top-0 left-0 w-full z-50">

        <!-- TOP BAR -->

        <div class="bg-[#B89B84] border-b border-black/5">

            <div class="max-w-7xl mx-auto px-6 lg:px-16 h-16 flex items-center justify-between">

                <!-- LOGO -->

                <a
                    href="/"
                    class="text-xl tracking-[6px] uppercase font-semibold"
                >
                    Selva ESG
                </a>

                <!-- SEARCH -->

                <div class="hidden md:flex items-center w-full max-w-xl mx-12">

                    <form
                        action="/blog"
                        method="GET"
                        class="relative w-full"
                    >

                        <input
                            type="text"
                            name="search"
                            placeholder="Buscar conteúdo..."
                            class="w-full bg-white/40 border border-black/10 rounded-full pl-14 pr-6 py-3 placeholder:text-black/40 focus:outline-none focus:bg-white/70 transition"
                        >

                        <!-- ICON -->

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 absolute left-5 top-1/2 -translate-y-1/2 text-black/40"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"
                            />

                        </svg>

                    </form>

                </div>

                <!-- RIGHT -->

                <div class="flex items-center gap-4">

                    <!-- INSTAGRAM -->

                    <a
                        href="https://instagram.com/"
                        target="_blank"
                        class="hover:scale-110 transition duration-300"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >

                            <rect
                                x="2"
                                y="2"
                                width="20"
                                height="20"
                                rx="5"
                                ry="5"
                                stroke-width="2"
                            />

                            <path
                                d="M16 11.37A4 4 0 1 1 12.63 8
                                4 4 0 0 1 16 11.37z"
                                stroke-width="2"
                            />

                            <line
                                x1="17.5"
                                y1="6.5"
                                x2="17.51"
                                y2="6.5"
                                stroke-width="2"
                            />

                        </svg>

                    </a>

                    <!-- SPOTIFY -->

                    <a
                        href="https://spotify.com/"
                        target="_blank"
                        class="hover:scale-110 transition duration-300"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path d="M12 0a12 12 0 100 24 12 12 0 000-24zm5.5 17.3a.75.75 0 01-1 .2c-2.7-1.6-6.2-2-10.3-1.2a.75.75 0 11-.3-1.5c4.5-.9 8.4-.4 11.4 1.4a.75.75 0 01.2 1zm1.4-3a.94.94 0 01-1.3.3c-3.1-1.9-7.8-2.5-11.5-1.4a.94.94 0 11-.6-1.8c4.3-1.3 9.5-.7 13.1 1.5a.94.94 0 01.3 1.3zm.1-3.2C15.4 8.9 9.4 8.7 6 9.7a1.13 1.13 0 11-.6-2.2c3.9-1.1 10.5-.9 14.8 1.7a1.13 1.13 0 11-1.2 1.9z"/>

                        </svg>

                    </a>

                    <!-- LINKEDIN -->

                    <a
                        href="https://linkedin.com/"
                        target="_blank"
                        class="hover:scale-110 transition duration-300"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path d="M4.98 3.5C4.98 4.88 3.86 6 2.48 6S0 4.88 0 3.5 1.12 1 2.48 1s2.5 1.12 2.5 2.5zM0 8h5v16H0V8zm7.5 0h4.8v2.2h.1c.7-1.3 2.3-2.7 4.8-2.7 5.1 0 6 3.3 6 7.6V24h-5v-7.6c0-1.8 0-4.2-2.6-4.2-2.6 0-3 2-3 4V24h-5V8z"/>

                        </svg>

                    </a>
                    <!-- NEWSLETTER -->

                    <button
                        onclick="window.dispatchEvent(new Event('open-newsletter'))"
                        class="w-10 h-10 rounded-full border border-black/10 hover:bg-white/40 flex items-center justify-center hover:scale-110 transition duration-300"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            />

                        </svg>

                    </button>

                    <!-- MENU -->

                    <div x-data="{ open: false }">

                        <!-- BUTTON -->

                        <button
                            @click="open = true"
                            class="w-14 h-14 rounded-full bg-black text-white flex items-center justify-center hover:scale-105 transition duration-500"
                        >

                            <div class="flex flex-col gap-1">

                                <span class="w-5 h-[2px] bg-white block"></span>

                                <span class="w-5 h-[2px] bg-white block"></span>

                                <span class="w-5 h-[2px] bg-white block"></span>

                            </div>

                        </button>

                        <!-- OVERLAY -->

                        <div
                            x-cloak
                            x-show="open"
                            x-transition.opacity
                            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40"
                            @click="open = false"
                        ></div>

                        <!-- SIDEBAR -->

                        <div
                            x-cloak
                            x-show="open"
                            x-transition:enter="transition ease-out duration-700"
                            x-transition:enter-start="translate-x-full opacity-0"
                            x-transition:enter-end="translate-x-0 opacity-100"
                            x-transition:leave="transition ease-in duration-500"
                            x-transition:leave-start="translate-x-0 opacity-100"
                            x-transition:leave-end="translate-x-full opacity-0"
                            class="fixed top-0 right-0 h-full w-full md:w-[440px] bg-[#111111]/95 backdrop-blur-2xl text-white z-50"
                        >

                            <div class="h-full flex flex-col justify-between p-12">

                                <!-- TOPO -->

                                <div>

                                    <div class="flex items-center justify-between mb-20">

                                        <h2 class="text-2xl tracking-[10px] uppercase text-white/60">

                                            Menu

                                        </h2>

                                        <button
                                            @click="open = false"
                                            class="text-4xl hover:rotate-90 transition duration-500"
                                        >
                                            ✕
                                        </button>

                                    </div>

                                    <!-- LINKS -->

                                    <div class="flex flex-col gap-5">
                                        <a
                                            href="/"
                                            class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300"
                                        >
                                            Home
                                        </a>

                                        <a
                                            href="/blog"
                                            class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300"
                                        >
                                            Blog
                                        </a>
                                        <div class="w-full h-px bg-white/10 my-10"></div>
                                        <p class="uppercase tracking-[6px] text-white/30 text-xs mb-4">
                                            Administração
                                        </p>
                                        @if(Auth::check() && Auth::user()->is_admin)

                                            <a href="/create-post" class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300">
                                                Adicionar Posts
                                            </a>

                                            <a href="/banners" class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300">
                                                Adicionar Banners
                                            </a>

                                            <a href="/about" class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300">
                                                Adicionar Sobre
                                            </a>

                                            <a href="/team" class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300">
                                                Adicionar Equipe
                                            </a>

                                            <a href="/comments" class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300">
                                                Gerenciar Comentários
                                            </a>

                                        @else

                                            <a
                                                href="/login"
                                                class="text-lg text-white/60 hover:text-white hover:translate-x-2 transition duration-300"
                                            >
                                                Login
                                            </a>

                                        @endif

                                    </div>

                                </div>

                                <!-- FOOTER -->

                                <div class="border-t border-white/10 pt-8">

                                    <p class="text-white/40 leading-relaxed">

                                        Conteúdo, sustentabilidade
                                        e inovação para transformar
                                        pessoas e negócios.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <main class="relative z-10 pt-36 px-8 md:px-12">

        @yield('content')

    </main>

    <!-- NEWSLETTER MODAL -->

<div
    x-data="newsletterModal()"
    x-init="init()"
>

    <!-- OVERLAY -->

    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/60 backdrop-blur-md z-[999]"
        style="display:none;"
    ></div>

    <!-- MODAL -->

    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-[1000] flex items-center justify-center p-6"
        style="display:none;"
    >

        <div
            class="w-full max-w-2xl bg-[#111111]/95 text-white rounded-[40px] p-10 md:p-14 shadow-2xl border border-white/10 relative overflow-hidden"
        >

            <!-- BG -->

            <div class="absolute -top-20 -right-20 w-72 h-72 bg-white/5 rounded-full blur-3xl"></div>

            <!-- CLOSE -->

            <button
                @click="closeOnly()"
                class="absolute top-6 right-6 text-white/60 hover:text-white text-3xl transition"
            >
                ✕
            </button>

            <!-- CONTENT -->

            <div class="relative z-10">

                <p class="uppercase tracking-[6px] text-white/40 text-sm mb-6">

                    Newsletter Selva

                </p>

                <h2 class="text-4xl md:text-6xl font-light leading-tight mb-8">

                    Participe da newsletter do Selva.

                </h2>

                <p class="text-white/70 text-lg leading-relaxed mb-10">

                    Conteúdo sobre ESG,
                    inovação, sustentabilidade
                    e transformação de negócios.

                </p>

                <!-- FORM -->

                <form
                    method="POST"
                    action="/newsletter/store"
                    class="flex flex-col gap-5"
                    @submit="submitNewsletter($event)"
                >

                    @csrf

                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="Digite seu melhor email"
                        class="w-full bg-white/10 border border-white/10 rounded-2xl p-5 text-white placeholder:text-white/40 focus:outline-none focus:border-white/30"
                    >

                    <!-- CHECK -->

                    <label class="flex items-center gap-3 text-white/60">

                        <input
                            type="checkbox"
                            @change="disableForever()"
                            class="w-5 h-5"
                        >

                        Não quero receber a newsletter

                    </label>

                    <!-- BUTTONS -->

                    <div class="flex flex-col md:flex-row gap-4 pt-4">

                        <button
                            type="submit"
                            class="bg-white text-black px-8 py-4 rounded-full hover:scale-105 transition duration-500"
                        >
                            Participar
                        </button>

                        <button
                            type="button"
                            @click="closeOnly()"
                            class="border border-white/20 px-8 py-4 rounded-full hover:bg-white hover:text-black transition duration-500"
                        >
                            Fechar
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>

    function newsletterModal() {

        return {

            open: false,

            cooldown: false,

            init() {

                // BOTÃO MANUAL DA NEWSLETTER

                window.addEventListener('open-newsletter', () => {

                    const savedEmail =
                        localStorage.getItem('newsletterEmail')

                    if (savedEmail) {

                        const newEmail = prompt(
                            `Seu email ${savedEmail} já está cadastrado.\n\nDigite um novo email caso queira atualizar:`
                        )

                        if (newEmail) {

                            fetch('/newsletter/store', {

                                method: 'POST',

                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN':
                                        document.querySelector('meta[name="csrf-token"]').content
                                },

                                body: JSON.stringify({

                                    email: newEmail,
                                    old_email: savedEmail

                                })

                            })

                            localStorage.setItem(
                                'newsletterEmail',
                                newEmail
                            )

                            alert('Email atualizado com sucesso.')

                        }

                        return
                    }

                    this.open = true

                })

                // NUNCA MAIS MOSTRA

                if (
                    localStorage.getItem('disableNewsletter')
                ) {
                    return;
                }

                // JÁ CADASTRADO

                if (
                    localStorage.getItem('newsletterSubmitted')
                ) {
                    return;
                }

                // ABERTURA AUTOMÁTICA NO SCROLL

                window.addEventListener('scroll', () => {

                    if (
                        window.scrollY > 1200 &&
                        !this.open &&
                        !this.cooldown
                    ) {

                        this.open = true;

                    }

                });

            },

            closeOnly() {

                this.open = false;

                this.cooldown = true;

                setTimeout(() => {

                    this.cooldown = false;

                }, 60000);

            },

            disableForever() {

                localStorage.setItem(
                    'disableNewsletter',
                    'true'
                );

                this.open = false;

            },

            submitNewsletter(event) {

                const email =
                    event.target.email.value

                localStorage.setItem(
                    'newsletterSubmitted',
                    'true'
                );

                localStorage.setItem(
                    'newsletterEmail',
                    email
                );

                this.open = false;

            }

        }

    }

</script>
<style>

.loader-grain {

    background-image:
        url("https://grainy-gradients.vercel.app/noise.svg");

    animation: grainMove 8s linear infinite;
}

@keyframes grainMove {

    0% {
        transform: translate(0, 0);
    }

    25% {
        transform: translate(-5%, 5%);
    }

    50% {
        transform: translate(5%, -5%);
    }

    75% {
        transform: translate(-5%, -5%);
    }

    100% {
        transform: translate(0, 0);
    }

}

</style>
</body>
</html>
