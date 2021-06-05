@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <main role="main" class="col-12 m-auto">
                <div class="pt-2 pb-2 mb-3 border-bottom">
                    <h1 class="font-weight-bold">Create A New Blog Post</h1>
                </div>


                    <form class="lead" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter blog title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Blog Content</label>
                            <textarea class="form-control" rows="5" name="content" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Upload Blog image</label>
                            <input type="file" class="form-control-file" name="image" >
                        </div>

                        <button type="submit" class="btn btn-primary">Publish Post</button>
                    </form>

            </main>
        </div>
    </div>
@endsection
