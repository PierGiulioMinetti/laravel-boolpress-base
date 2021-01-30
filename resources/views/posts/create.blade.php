@extends('layouts.main')

@section('content')
        <section class="container mb-5">
           
            <h1>
                CREATE A NEW POST
            </h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

           <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control" type="text" name="body" id="body"> 
                        {{old('body')}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="path_img">Post image</label>
                    <input class="form-control"  type="file" name="path_img" id="path_img" accept="image/*" >
                </div>

                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Create a post">
                </div>
           </form>
        </section>
@endsection