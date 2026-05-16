@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Comentários
</h1>

<div class="flex flex-col gap-6">

    @foreach($comments as $comment)

        <div class="bg-white p-6 rounded-2xl shadow">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-2xl font-bold mb-2">

                        {{ $comment->name }}

                    </h2>

                    <p class="text-zinc-700 mb-4">

                        {{ $comment->comment }}

                    </p>

                    <p class="text-sm text-zinc-500">

                        Post:
                        {{ $comment->post->title }}

                    </p>

                </div>

                <div class="flex gap-2">

                    @if(!$comment->approved)

                        <form
                            action="/comment/approve/{{ $comment->id }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')

                            <button
                                class="bg-green-500 text-white px-4 py-2 rounded-xl"
                            >
                                Aprovar
                            </button>

                        </form>

                    @endif

                    <form
                        action="/comment/delete/{{ $comment->id }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-xl"
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