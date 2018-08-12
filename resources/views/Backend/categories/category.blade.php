@extends('Backend.layout.master')
@section('title',$categories->name)
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

        @if(session()->has('disctivated'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!</strong>  Post Disctivated successfully
            </div>
        @endif



        <h4>
            <a href="{{route('categories.index')}}">Categories</a> >
            {{$categories->name}}
        </h4>
        <!-------------------- /post ------------------------------------>

        <div class="x_panel">
            <div class="x_title">
                    <a href="categoryPost/{{$categories->id}}/new"><button type="button" class="btn btn-danger btn-lg">New Post</button><a>
                            <div class="clearfix"></div>

                <div class="clearfix"></div>
            </div>


            <div class="x_content">
                <!-- start project list -->
                <table class="table table-striped projects">
                    @if($categories->posts_count >0 )
                        <thead>
                        <tr>
                            <th style="width: 1%">#</th>
                            <th>Post Image</th>
                            <th >Category</th>
                            <th>Post Title</th>
                            <th>Comments#</th>
                            <th>Active</th>
                            <th style="width: 20%">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!---------table row---------->

                        @foreach($categories->posts as $key=> $post)

                            <tr>
                                <!--#------> <td>{{$key+1}}</td>
                                <!--Image--> <td> <img src="{{asset('storage/'.$post->img)}}" style="max-width: 100px; height: 50px;"  alt="Post Image"> </td>
                                <!--category------> <td>{{$categories->name}}</td>
                                <!--Title--------><td><a>{{$post->title}}</a><br/> </td>
                                <!--comments--------><td><a>0</a><br/> </td>
                                <!--Active------>  <td>
                                    @if($post->active === 1)
                                        <div class="btn btn-success btn-xs">Active</div>
                                    @else
                                        <dive class="btn btn-default btn-xs">Passive</dive>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('categoryPosts.edit',$post->id)}}" class="btn btn-info"> Edit </a>
                                    <!---<a href="categories/{{$categories->id}}/{{$post->id}}" class="btn btn-danger"> View </a>--->
                                    <a href="categoryPost/{{$post->id}}" class="btn btn-danger"> View </a>

                                    <!-- Split button -->
                                    <div class="btn-group">
                                        @if($post->active === 1)
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Active</button>
                                        @else
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Passive</button>
                                        @endif

                                        <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="/admin/posts/{{$post->id}}/active">Active</a>
                                            </li>
                                            <li><a href="/admin/posts/{{$post->id}}/passive">Passive</a>
                                            </li>
                                        </ul>
                                    </div>





                                </td>
                            </tr>
                            <!---------/table row---------->

                        @endforeach

                        @else
                            <p>No posts in this category</p>
                        @endif


                        </tbody>

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