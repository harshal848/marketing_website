@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <main role="main" class="col-12 m-auto">
                <div class="d-flex justify-content-between  align-items-center pt-2 pb-2 mb-3 border-bottom">
                    <h1>All Posts</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary float-right font-weight-bold">Add Post</a>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="row ml-md-1 mr-md-3">
                    @foreach($posts as $post)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card mb-4 ml-md-2">
                                <img class="card-img-top" src="{{ url("blog_images/$post->filename")}}" alt="Blog Post Image">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $post->title }}</h5>
                                    <p class="text-muted">posted at {{$post->created_at}} by admin</p>
                                    <p class="card-text lead">
                                        {{ \Illuminate\Support\Str::limit($post->content, 200, "\r\n\n .....") }}
                                    </p>

                                    <a href="{{ route('posts.edit', $post->id) }}" class="card-link btn btn-primary float-left mb-2 font-weight-bold">Edit</a>
                                    <a href="{{ route('posts.show', $post->id) }}" class="card-link btn btn-primary float-left mb-2 mr-4 font-weight-bold">Read More</a>


                                    <form action="{{route('posts.destroy',$post->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class=" btn btn-danger font-weight-bold" type="submit">Delete</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </main>
        </div>

        {!! $posts->links("pagination::bootstrap-4") !!}
    </div>

@endsection
