@extends('Frontend.layout.master')

@section('title','Home')
@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Latest Posts
                    <small>Secondary Text</small>
                </h1>

            @foreach($posts as $key=> $post)
                <!-- Blog Post -->
                <div class="card mb-4">
                    <img class="card-img-top" style="max-height: 400px" src="{{asset('storage/'.$post->img)}}" alt="post image">
                    <div class="card-body">
                        <h2 class="card-title">{{$post->title}}</h2>
                        <p class="card-text">{{$post->description}}</p>
                        <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{$post->created_at}} by
                        <b>{{$post->author_name}}</b>   <span style="float:right; font-size:16px; background-color: #2c9e5d; color:white" class="badge bg-green">{{$post->name}}</span>
                    </div>
                </div>
            @endforeach



                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    {{$posts->links()}}
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">



                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                    <form action="home/search" method="POST" role="search">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="submit">Go!</button>
                          </span>
                        </div>
                        </form>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>

                    <ul class="card-body">
                        @foreach($categories as $key=> $category)

                        <li><a  href="{{route('category.show',$category->id)}}">{{$category->name}} ({{$category->posts_count}})</a></li>

                        @endforeach
                    </ul>

                </div>

            </div>
            <!-- /.row -->

        </div>
        </div>

@endsection
