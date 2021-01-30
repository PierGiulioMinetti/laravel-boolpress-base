@extends('layouts.main')

@section('content')
        <section class="container mb-5">
            <p>
                last update: {{$post->updated_at->diffForHumans()}}
            </p>
            <h1>
                {{$post->title}}
            </h1>

            <div class="btn btn-success">
                <a href="{{route('posts.edit', $post->slug)}}">edit</a>
            </div>
            <form class="d-inline" action="{{route('posts.destroy', $post->id)}}" method="POST">         
                @csrf
                @method('DELETE')

                <input class="btn btn-danger" type="submit" value="Delete">
            </form>

            <p>
                {{$post->body}}
            </p>
            
            {{-- post if I have images --}}
            @if (!empty($post->path_img))

                                    {{-- concateno seguendo la path dell'immagine --}}
                <img width="500px" src="{{ asset('storage/' . $post->path_img) }}" alt="{{ $post->title }}">

                @else 

                <img src="{{asset('no-img/no-image.png' )}}"> 
                
            @endif
        </section>
@endsection