@extends('Backend.layout.master')
@section('title','Edit Post')
@section('content')
    <!-- page content -->
    <div  role="main">
    
    <h4>
      <a href="{{route('posts.index')}}">Posts</a><b> ></b>
      <a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a> <b> ></b> Edit
    </h4>
        <div class="clearfix"></div>

        <!--------------------------------------------------------------------------->
        <!------------- Left side content ------------------------------------------>

							     @if ($errors->has('title'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('title') }}
                        </div>

                    @endif


                    @if ($errors->has('Description'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('Description') }}
                        </div>
                    @endif

                    @if ($errors->has('Content'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('Content') }}
                        </div>
                    @endif

                    @if ($errors->has('img'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('img') }}
                        </div>
                    @endif

                    @if ($errors->has('source_url'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('source_url') }}
                        </div>
                    @endif

                    @if ($errors->has('author_name'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('author_name') }}
                        </div>
                    @endif

                    @if ($errors->has('author_img'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('author_img') }}
                        </div>
                    @endif
                    @if ($errors->has('Source'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('Source') }}
                        </div>
                    @endif
        <!-------------------- /post ------------------------------------>

        <div class="x_panel">
            <div class="x_title">
              <h4>
                <a href="{{route('categories.index')}}">Posts</a> >
                New
              </h4>
                <div class="clearfix"></div>
            </div>


            <div class="x_content">
                	<!------------  form ------------------------------------->
                                  <!---------edit form  -------------------------------------------------------------------------------------------------------------->
                        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data"  action="{{route('posts.update',$post->id)}}" novalidate>

                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          <input name="_method" value="PUT" type="hidden">

                          <!-----Image---------------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="category">Image <span class="required">*</span></label>
                          <img src="{{asset('storage/'.$post->img)}}" value="{{$post->img}}"class="col-md-6 col-sm-6 col-xs-12" alt="post image">
                          </div>

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="img" name="img"  required="required" class="col-md-6 col-sm-6 col-xs-12" >
                            </div>
                          </div>


                          <!------Category----------->

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="category">Category <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="category" class=form-control col-md-7 col-xs-12">
                              <option  value="{{$post->category_id}}">{{$post->name}}</option>
                              @foreach($categories as $key=> $category)
                                 <option  value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach

                              </select>
                            </div>
                          </div>

                          <!------Title----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="title" class="form-control col-md-7 col-xs-12" value="{{$post->title}}" data-validate-words="1" name="title" placeholder="category name" required="required" type="text">
                            </div>
                          </div>

                          <!------Description----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="Description" name="Description" required="required" class="form-control col-md-7 col-xs-12">{{$post->description}}</textarea>
                            </div>
                          </div>

                          <!------Content----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Content <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="Content" name="Content" required="required" class="form-control col-md-7 col-xs-12">{{$post->content}}</textarea>
                            </div>
                          </div>
                          
                          <!------source_url----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="source_url">Source URL <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="source_url" name="source_url" value="{{$post->source_url}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <!------Author_firstName----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_name">Author Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="author_name" name="author_name" value="{{$post->author_name}}" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                           <!------Author_image----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_name">Author Image <span class="required">*</span>
                             
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="profile_pic" >
                                <img style="  width:100%;  max-width:100px;" src="{{asset('storage/'.$post->author_img)}}" alt="author image" class="img-circle profile_img">
                             <br/><br/> <input type="file" id="author_img" name="author_img">
                              </div>
                              
                            </div>
                          </div>



                          <!------Active----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="active">Active <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="active" class=form-control col-md-7 col-xs-12">
                              @if($post->active === 1)
                                <option  value="1">Active</option>
                                <option  value="0">Passive</option>
                              @else
                                <option  value="0">Passive</option>
                                <option  value="1">Active</option>
                              @endif

                              </select>
                            </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <a href="{{ URL::previous() }}" type="button" class="btn btn-default">Cancel</a>
                              <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                          </div>
                        </form>


									<!------------ End form ------------------------------------->

                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>

        </div>
    </div>

    <!-- /page content -->


@endsection