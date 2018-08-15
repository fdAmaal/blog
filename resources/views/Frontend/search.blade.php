@extends('Frontend.layout.master')

@section('title','Home')
@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                  @if(isset($details))              
                   <h1 class="my-4">Search Result
                    <small> The Search results for <b> {{ $query }} </b> are :</small>
                </h1>

            @foreach($details as $key=> $post)
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
                        <a href="#">{{$post->author_name}}</a>
                    </div>
                </div>
            @endforeach
            @else 
            <h1 class="my-4">Search Result
                    <small> No Result</small>
                </h1> 
                          @endif


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
           
            <!-- /.row -->

        </div>
        </div>

@endsection
