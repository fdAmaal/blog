@extends('Backend.layout.master')
@section('title','Posts')
@section('content')
 <!-- page content -->
 <div  role="main">
            <div class="clearfix"></div>

			 <!--------------------------------------------------------------------------->
			 <!------------- Left side content ------------------------------------------>

     @if(session()->has('message.level'))
         <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success!</strong> {!! session('message.content') !!}
         </div>


     @endif


     @if(session()->has('Activated'))
         <div  class="alert alert-info alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Warning!</strong>  Post Activated successfully
         </div>

     @endif

     @if(session()->has('disactivated'))
         <div class="alert alert-info alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Warning!</strong>  Post Disctivated successfully
         </div>
     @endif

        <div class="page-title">
              <div class="title_left">
                <h3>Posts</h3>
              </div>

             <!-------------------- search ------------------------------------>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form action="posts/search" method="POST" role="search">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search for post...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>

                    </form>
                </div>
              </div>
             <!-------------------- /search ------------------------------------>
        </div>


			   <!-------------------- /post ------------------------------------>

              <div class="x_panel">
              <div class="x_title">
              <a href="{{route('posts.create')}}"><button type="button" class="btn btn-danger btn-lg">New Post</button><a>
                    <div class="clearfix"></div>
                  </div>


                <div class="x_content">
                   <!-- start project list -->
                   <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th>Post Image</th>
                          <th >Category</th>
                          <th>Post Title</th>
                          <th>Comments Count</th>
                          <th>Active</th>
                          <th style="width: 20%">Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <!---------table row---------->
                      @foreach($posts as $key=> $post)

                          <tr>
                          <!--#------> <td>{{$key+1}}</td>
                          <!--Image--> <td> <img src="{{asset('storage/'.$post->img)}}" style="max-width: 100px; height: 50px;"  alt="Post Image"> </td>
                          <!--category------> <td>{{$post->name}}</td>
                          <!--Title--------><td><a>{{$post->title}}</a><br/> </td>
                          <!--Title--------><td><a>{{$post->comments_count}}</a><br/> </td>
                          <!--Active------>  <td>
                          @if($post->active === 1)
                            <div class="btn btn-success btn-xs">Active</div>
                          @else
                            <dive class="btn btn-default btn-xs">Passive</dive>
                          @endif
                          </td>
                          <td>
                          <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info"> Edit </a>
                          <a href="{{route('posts.show',$post->id)}}" class="btn btn-danger"> View </a>
                              <!-- Split button -->
                              <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>


                                  <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="posts/{{$post->id}}/active">Active</a>
                                      </li>
                                      <li><a href="posts/{{$post->id}}/passive">Passive</a>
                                      </li>
                                  </ul>
                              </div>





                          </td>
                        </tr>
                        <!---------/table row---------->

                      @endforeach



                      </tbody>
                       {{$posts->links()}}
                    </table>


                    <div class="clearfix"></div>

              </div>
		   <!------------- /Right side content ------------------------------------------>
		   <!-------------------------------------------------------------------------->

			    <div class="clearfix"></div>

            </div>
        </div>

        <!-- /page content -->


@endsection