@extends('Backend.layout.master')

@section('title','Post')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">

      <div class="">
        <div class="col-md-8 col-lg-8 col-sm-7">


          <!-------------------- /post ------------------------------------>

          <div class="x_panel">
            <div class="x_title">
              <div class="bs-example">
                <!----------------Image----------------->
                <td> <img src="{{asset('storage/img/'.$post->img)}}"  style="max-width: 600px;"  alt="post image"> </td>
                <p>{{$post->publish_date}} </p>
              </div>

              <div class="clearfix"></div>
            </div>
            <div class="x_content">


              <h2>{{$post->title}}  </h2>



                <div class="profile_pic" >
                  <img style="max-width: 50px; height: 50px;" src="{{asset('storage/img/'.$post->img)}}" alt="..." class="img-circle">
                  <span>{{$post->author_firstName}} </span> <span>{{$post->author_lastName}} </span>
                </div>

                <br/>
              <p class="message"><br/><br/><br/>
                <span>{{$post->description}} </span></span>
              </p>

              <p class="message"><br/><br/><br/>
                <span>{{$post->content}} </span> <span><a href="{{$post->source}}"><i class="fa  fa-external-link"></i></a></span>
              </p>

              <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-12">

              <span class="label label-default">Default</span>
              <span class="label label-primary">Primary</span>
              <span class="label label-success">Success</span>
              <span class="label label-info">Info</span>
              <span class="label label-warning">Warning</span>
              <span class="label label-danger">Danger</span>
              <ul class="nav navbar-right panel_toolbox">

                <div  data-container="body" data-toggle="popover" data-placement="left">

                  <span style="margin-items: left;" class="badge bg-green">0 <i class="fa  fa-thumbs-o-up" aria-hidden="true"></i></span>
                  <span style="margin-items: left;" class="badge bg-blue">{{$commentcount}} <i class="fa  fa-comment" aria-hidden="true"></i></span>
                </div>
              </ul>
            </div>

            <br/> <hr/> <br/>
            <div class="clearfix"></div>

            <!----------- Comments -------------------->
          @if($commentcount > 0)

              <div class="bs-example"    style="overflow: scroll;">
                <div >
                  <div class="x_panel">
                    <div class="x_content">

                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th style="width: 20%">User</th>
                          <th>Comment</th>
                          <th style="width: 3%">Activation</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>
                          <td>
                            <div class="profile_pic" >
                              <img style="max-width: 50px; height: 50px;" src="{{asset('storage/img/'.$post->img)}}" alt="..." class="img-circle">

                            </div>
                          </td>
                          <td>{{$comment->comment}}</td>
                          <td>
                            <!-- Split button -->
                            <div class="btn-group">
                              @if($comment->active === 1)
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Active</button>
                              @else
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Passive</button>
                              @endif

                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('comments.destroy',$comment->id)}}">Active</a>
                                </li>
                                <li><a href="{{route('comments.destroy',$comment->id)}}">Passive</a>
                                </li>
                              </ul>
                            </div>

                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>

            @endif
          </div>

          <!-------------------- /post ------------------------------------>

        </div>
        <!------------- /Left side content ------------------------------------------->






      </div>
      <div class="clearfix"></div>

    </div>
  </div>
  <!-- /page content -->

@endsection