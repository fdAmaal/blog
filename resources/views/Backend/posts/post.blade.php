@extends('Backend.layout.master')
@section('title','Post')
@section('content')
  <!-- page content -->
  <div  role="main">
    <div class="clearfix"></div>

    <!--------------------------------------------------------------------------->
    <!------------- Left side content ------------------------------------------>

    @if ( isset($_GET['success']) )
    {
    echo "<script type='text/javascript'>
          alert('تم الحفظ بنجاح');</script>";

    }
    @endif

    <h4>
      <a href="{{route('posts.index')}}">Posts</a> >
      {{$post->title}}
    </h4>


    <!-------------------- /post ------------------------------------>
    <!------------- Left side content ------------------------------------------->
    <div class="col-md-7 col-sm-7 col-xs-12">


      <!-------------------- /post ------------------------------------>
      <div class="x_panel">

        <div class="x_title">
          <h2>Post</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <div class="bs-example" data-example-id="simple-jumbotron">

            <div class="product-image">
              <img src="{{asset('storage/'.$post->img)}}"  alt="Post Image"/>
            </div><br/>
            <h4> <b>{{$post->title}}</b></h4>
            <p class="message">
              {{$post->content}}
            </p>

          </div>
        </div>
      </div>
      <!-------------------- /post ------------------------------------>

    </div>
    <!------------- /Left side content ------------------------------------------->
    <!--------------------------------------------------------------------------->


    <!--------------------------------------------------------------------------->
    <!------------- Right side content ------------------------------------------->
    <div class="col-md-5 col-sm-5 col-xs-12">

      <!-------------- tags --------------------------------------------->
      <div class="x_panel">
        <div class="x_title">
          <h2>Post Details</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class=" col-md-5 col-sm-5 col-xs-12 table table-striped table-bordered">
            <tr>
              <th>Post Title</th>
              <th>{{$post->title}}</th>
            </tr>
            <tr>
              <th>Author Name</th>
              <td>{{$post->author_name}}</td>
            </tr>
            <tr>
              <th>Post Description</th>
              <td>{{$post->description}}</td>
            </tr>
            <tr>
              <th>Created at</th>
              <td>{{$post->created_at}}</td>
            </tr>
            <tr>
              <th>Updated at</th>
              <td>{{$post->updated_at}}</td>
            </tr>
            <tr>
              <th>Source URL</th>
              <td>{{$post->source_url}}</td>
            </tr>

            <tr>
              <th>Category</th>
              <td>{{$post->category->name}}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>
                <!-- Split button -->
                <div class="btn-group">
                  @if($post->active === 1)
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Active</button>
                  @else
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Passive</button>
                  @endif

                  <span class="sr-only">Toggle Dropdown</span>

                  <ul class="dropdown-menu" role="menu">
                    <li><a href="{{$post->id}}/active">Active</a>
                    </li>
                    <li><a href="{{$post->id}}/passive">Passive</a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <!------------ /tags --------------------------------------------->

    </div>
    <!------------- /Right side content ------------------------------------------->
    <!--------------------------------------------------------------------------->

    <div class="clearfix"></div>
    <!-------------------- /post ------------------------------------>













    <!-------------------- comments ------------------------------------>
    <div class="col-md-12">
      <div class="x_panel ">
        <div class="x_title">
          <h3>Comments   <span style="margin-items: left; color:white;" class="badge bg-blue">{{$post->comments_count}} <i class="fa fa-comment" aria-hidden="true"></i></span></h3>
          <div class="clearfix"></div>
        </div>


        <div class="x_content">
          <!-- start project list -->
          <table class="table">

            <thead>
            <tr>
              <th>#</th>
              <th >User Name</th>
              <th>Comment</th>
              <th>Likes</th>
              <th>Dislikes</th>
              <th>Active</th>

            </tr>
            </thead>
            <tbody>
            <!---------table row---------->
            @foreach($post->comments  as $key=> $comment)
              <tr>
                <td>

                  <!--#--> {{$key+1}} </td>
                <!--User Name--> <td> {{$comment->user->name}} </td>
                <!--Comment------> <td>{{$comment->comment}}</td>
                <!--Likes-------->
                <td>
                  {{$comment->likes->pluck('like')->sum()}}
                </td>
                <!--Dislikes--------><td><a>{{$comment->likes->pluck('dislike')->sum()}}</a><br/> </td>
                <!--Active------>
                <td>
                  <!-- Split button -->
                  <div class="btn-group">
                    @if($comment->active === 1)
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Active</button>
                    @else
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Passive</button>
                    @endif

                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="comments/{{$comment->id}}/active">Active</a>
                      </li>
                      <li><a href="comments/{{$comment->id}}/passive">Passive</a>
                      </li>
                    </ul>
                  </div>

                </td>
              </tr>
            @endforeach
            <!---------/table row---------->

            </tbody>

          </table>

          <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>

      </div>
      <div class="clearfix"></div>
    </div>







  </div>
  <!-- /page content -->




@endsection