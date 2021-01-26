@extends('layouts.main')

@section('content')
        <section class="container mb-5">
            
            @if (session('post-deleted'))
                <div class="alert alert-success">
                    Post '{{ session('post-deleted')}}' has been succesfully deleted.
                </div>
                
            @endif

            <h1>
                BLOG ARCHIVE
            </h1>

            @forelse ($posts as $post)
                <h2>
                    {{$post->title}}
                </h2>
                <h5>
                    {{$post->created_at->format('d/m/Y')}}
                </h5>
                <p>
                    {{$post->body}}
                </p>
                <a href="{{route('posts.show', $post->slug)}}">read more</a>
            @empty
                <h2>
                    No post found, 
                     <a href="{{ route('posts.create')}}">
                         create a new
                     </a> 
                </h2>
            @endforelse
        </section>
@endsection