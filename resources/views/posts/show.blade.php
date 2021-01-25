@extends('layouts.main')

@section('content')
        <section class="container mb-5">
            IO SONO LA SEZIONE SHOW
            <h1>
                {{$post->title}}
            </h1>
            <p>
                {{$post->body}}
            </p>
            
            {{-- post if I have images --}}
            @if (!empty($post->path_img))

                                    {{-- concateno seguendo la path dell'immagine --}}
                <img src="{{ asset('storage/' . $post->path_img) }}" alt="{{ $post->title }}">
            @endif
        </section>
@endsection