@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-4xl font-bold">
        Banners
    </h1>

    <a
        href="/create-banner"
        class="bg-black text-white px-4 py-3 rounded-lg"
    >
        Novo Banner
    </a>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @foreach($banners as $banner)

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <img
                src="{{ asset('storage/' . $banner->image) }}"
                class="w-full h-56 object-cover"
            >

            <div class="p-5">

                <div class="flex justify-between items-center mb-4">

                    <h2 class="text-2xl font-bold">

                        {{ $banner->title }}

                    </h2>

                    @if($banner->active)

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            Ativo
                        </span>

                    @else

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                            Inativo
                        </span>

                    @endif

                </div>

                <div class="space-y-2 text-sm text-zinc-600 mb-5">

                    <p>
                        <strong>Início:</strong>

                        {{ $banner->starts_at ?? 'Sem data' }}
                    </p>

                    <p>
                        <strong>Fim:</strong>

                        {{ $banner->ends_at ?? 'Sem data' }}
                    </p>

                </div>

                <div class="flex flex-wrap gap-2">

                    <a
                        href="/banner/{{ $banner->id }}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg"
                    >
                        Ver
                    </a>

                    <a
                        href="/banner/edit/{{ $banner->id }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg"
                    >
                        Editar
                    </a>

                    <form
                        action="/banner/toggle/{{ $banner->id }}"
                        method="POST"
                    >

                        @csrf
                        @method('PATCH')

                        <button
                            class="bg-zinc-700 hover:bg-zinc-800 text-white px-4 py-2 rounded-lg"
                        >

                            @if($banner->active)

                                Desativar

                            @else

                                Ativar

                            @endif

                        </button>

                    </form>

                    <form
                        action="/banner/delete/{{ $banner->id }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg"
                        >
                            Excluir
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @endforeach

</div>

@endsection