@extends('Backend.layout.master')

@section('title',$categories->name)
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{$categories->name}}</h3>
                </div>
                <div class="">
                    <div class="col-md-8 col-lg-8 col-sm-7">

                        @if($postcount >0 )
                                <!-------------------- /post ------------------------------------>
                                @foreach($posts as $post)
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


                                        <a href="{{route('posts.show',$post->id)}}"><h2>{{$post->title}}<h2></a>


                                        <div class="profile_pic" >
                                            <img style="max-width: 50px; height: 50px;" src="{{asset('storage/img/'.$post->img)}}" alt="..." class="img-circle">
                                            <span>{{$post->author_firstName}} </span> <span>{{$post->author_lastName}} </span>
                                        </div>

                                        <br/>
                                        <p class="message"><br/><br/><br/>
                                            <span>{{$post->description}} </span> <span><a href="{{$post->source}}"><i class="fa  fa-external-link"></i></a></span>
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
                                                <span style="margin-items: left;" class="badge bg-blue">0<i class="fa  fa-comment" aria-hidden="true"></i></span>
                                            </div>
                                        </ul>
                                    </div>

                                    <br/> <hr/> <br/>
                                    <div class="clearfix"></div>
                                </div>
                                @endforeach
                                <!-------------------- /post ------------------------------------>
                        @else
                        <p>No posts in this category</p>
                            @endif
                    </div>
                    <!------------- /Left side content ------------------------------------------->






                </div>
                <div class="clearfix"></div>

            </div>
        </div>
        <!-- /page content -->

@endsection