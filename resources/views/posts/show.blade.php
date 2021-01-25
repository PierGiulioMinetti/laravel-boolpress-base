@extends('layouts.main')

@section('content')
        <section class="container mb-5">
            <p>
                last update: {{$post->updated_at->diffForHumans()}}
            </p>
            <h1>
                {{$post->title}}
            </h1>

            <div class="btn btn-danger">
                <a href="{{route('posts.edit', $post->slug)}}">edit</a>
            </div>

            <p>
                {{$post->body}}
            </p>
            
            {{-- post if I have images --}}
            @if (!empty($post->path_img))

                                    {{-- concateno seguendo la path dell'immagine --}}
                <img src="{{ asset('storage/' . $post->path_img) }}" alt="{{ $post->title }}">

                @else 

                <img src="https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png"> 
                
            @endif
        </section>
@endsection