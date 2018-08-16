@extends('Frontend.layout.master')

@section('title',$post->title)
@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <b>{{$post->author_name}}</b>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{$post->created_at}}  <span style="float:right; font-size:16px; background-color: #2c9e5d; color:white" class="badge bg-green">{{$post->category->name}}</span>
              </p>
                    
                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" style="max-height: 450px; max-width: 100%" src="{{asset('storage/'.$post->img)}}" alt="post image">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->description}}</p>

                <p>  {{$post->content}}</p>

                <span style="background-color: #2c9e5d; color:white" class="badge bg-green">0</span>
                    <span style="background-color: #2c4c9e; color:white" class="badge bg-green"><i class="fa  fa-thumbs-o-up"></i>0</span>
                    <span style="background-color: #9e2c4c; color:white" class="badge bg-green"><i class="fa  fa-thumbs-o-down"></i>0</span>

                <hr>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a> or
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a> to leave a comment
                    <hr/>
                @else
                    <!-- Comments Form -->
                        <div class="card my-4">
                            <h5 class="card-header">Leave a Comment:</h5>
                            <div class="card-body">
                                <form action="{{route('comment.store')}}" method="post">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" rows="3"></textarea>
                                        <input type="hidden" name="post_id" value="{{$post->id}}"/>
                                        <input type="hidden" name="user_id" value=" {{ Auth::user()->id }}"/>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                @endguest




                <!-- Single Comment -->

            @if($post->comments_count === 0)
                    <div class="media mb-4">
                         <div class="media-body">
                            <p class="mt-0">No comments yet, leave the First comment!</p>
                        </div>
                    </div>
                @else

                    <div class="card my-4" >
                        <h6 class="card-header">Comments ({{$post->comments_count}})</h6>
                        <div class="card-body" style=" height: 300px;overflow-y: scroll;">

                            @foreach($post->comments  as $key=> $comment)
                                <div class="media mb-4">
                                    <img class="d-flex mr-3 rounded-circle" style="border-style: solid; border-color: #e2e2e2; max-height: 60px; max-width: 60px" src="{{asset('storage/'.$comment->user->img)}} " alt="">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{$comment->user->name}} <span><small>{{$comment->created_at}}</small></span> </h5>
                                        <h5 class="mt-0"></h5>
                                        &nbsp;&nbsp;&nbsp;&nbsp; {{$comment->comment}} <br/><br/>

                                         <span><a href="comments/{{$comment->id}}/like"><i style="color:#2387ce" class="fa fa-thumbs-up"></i> </a> {{$comment->likes->pluck('like')->sum()}}</span>&nbsp;
                                         <span><a href="comments/{{$comment->id}}/dislike"><i style="color:#707070" class="fa fa-thumbs-down"></i></a> {{$comment->likes->pluck('dislike')->sum()}}</span>
                                    </div>
                                </div><hr/>
                            @endforeach

                        </div>
                    </div>

            @endif


            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

               <!-- Search Widget -->
               <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                    <form action="/public/admin/blog/public/home/search" method="POST" role="search">
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

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
