@extends('layouts.app')

@section('content')

<div class="bg-white rounded shadow overflow-hidden">

    <img
        src="{{ asset('storage/' . $banner->image) }}"
        class="w-full h-[400px] object-cover"
    >

    <div class="p-6">

        <h1 class="text-4xl font-bold mb-4">

            {{ $banner->title }}

        </h1>

        <p class="mb-4">

            <strong>Link:</strong>

            <a
                href="{{ $banner->link }}"
                target="_blank"
                class="text-blue-500"
            >
                {{ $banner->link }}
            </a>

        </p>

        <p class="mb-2">

            <strong>Início:</strong>

            {{ $banner->starts_at }}

        </p>

        <p class="mb-2">

            <strong>Fim:</strong>

            {{ $banner->ends_at }}

        </p>

        <p class="mb-6">

            <strong>Status:</strong>

            @if($banner->active)

                <span class="text-green-600">
                    Ativo
                </span>

            @else

                <span class="text-red-600">
                    Inativo
                </span>

            @endif

        </p>

        <div class="flex gap-3">

            <a
                href="/banner/edit/{{ $banner->id }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded"
            >
                Editar
            </a>

            <form
                action="/banner/delete/{{ $banner->id }}"
                method="POST"
            >

                @csrf
                @method('DELETE')

                <button
                    class="bg-red-500 text-white px-4 py-2 rounded"
                >
                    Excluir
                </button>

            </form>

        </div>

    </div>

</div>

@endsection