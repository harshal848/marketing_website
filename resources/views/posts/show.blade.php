
@extends('layouts.app')

@section('content')

<style>
    @media (min-width: 768px) {
        .blog-image {
            width: 65%;
            height: 65%;
            margin-top: 10px
        }
    }
</style>

    <div class="container">
        <div class="row">

            <main role="main" class="col-12 m-auto">
                <div class="d-flex justify-content-between  align-items-center pt-2 pb-2 mb-3 border-bottom">
                    <h1> Blog Post</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary float-right font-weight-bold">Add Post</a>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row ml-md-1 mr-md-3">
                        <div class="col-sm-12">
                            <div class="card mb-4 ml-md-2">
                                <div class=" mx-md-auto blog-image">
                                    <img class="card-img-top" src="{{ url("blog_images/$post->filename")}}" alt="Blog Post Image" >
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $post->title }}</h5>
                                    <p class="text-muted">posted at {{$post->created_at}} by admin</p>
                                    <p class="card-text lead">
                                        {{ $post->content }}
                                    </p>

                                    @guest
                                        <a href="{{ route('posts.edit', $post->id) }}" class="float-left card-link btn btn-primary mb-2 font-weight-bold">Edit</a>

                                        <a href="{{ url()->previous() }}" class="card-link btn btn-primary float-left mb-2 mr-4">Go back</a>
                                        @else

                                        <a href="{{ route('posts.edit', $post->id) }}" class="float-left card-link btn btn-primary mb-2  font-weight-bold">Edit</a>

                                        <a href="{{ url()->previous() }}" class="card-link btn btn-primary float-left mb-2 mr-4 font-weight-bold">Go back</a>
                                        <form class="float-left" action="{{route('posts.destroy',$post->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class=" btn btn-danger font-weight-bold" type="submit">Delete</button>
                                        </form>

                                    @endguest


                                </div>
                            </div>
                        </div>
                </div>


            </main>
        </div>

    </div>

@endsection

