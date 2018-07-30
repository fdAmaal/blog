@extends('Backend.layout.master')

@section('title','Edit Post')
@section('content')
  <!-- page content -->

  <div class="right_col" role="main">

    <h4>
      <a href="{{route('categories.index')}}">Categories</a> >
      <a href="{{route('categories.show',$post->category_id)}}">{{$post->category->name}}</a> >
      <a href="{{route('categoryPosts.show',$post->id)}}"> {{$post->title}}</a> > Edit
    </h4>
    <div class="">


      <div class="clearfix"></div>

      <div class="row">

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Edit Post</h2>
                <div class="clearfix"></div>
              </div>
              @if(session()->has('message.level'))
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> {!! session('message.content') !!}
                </div>

              @endif
              <div class="x_content">
                <br />

                <div>

                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="post-tab">

                        <!---------edit form  -------------------------------------------------------------------------------------------------------------->
                        <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data"  action="{{route('categoryPosts.update',$post->id)}}" novalidate>

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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="Title" class="form-control col-md-7 col-xs-12" value="{{$post->title}}" data-validate-words="1" name="Title" placeholder="category name" required="required" type="text">
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

                          <!------Author_firstName----------->
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_name">Author FirstName <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="author_name" name="author_name" value="{{$post->author_name}}" required="required" class="form-control col-md-7 col-xs-12">
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


                      </div>



                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>
        </div>




      </div>




    </div>
  </div>
  <!-- /page content -->

@endsection