@extends('Backend.layout.master')

@section('title','New Post')
@section('content')
   <!-- page content -->
   <div class="right_col" role="main">
          <div class="">

              <h4>
                  <a href="{{route('categories.index')}}">Categories</a> >
                  <a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a> >
                  New Post
              </h4>
            <div class="clearfix"></div>



              <div class="row">
			     
			<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Post</h2>
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




                  <!------------  form ------------------------------------->
                                    <div>
                                        <form method="post" enctype="multipart/form-data"  action="{{route('posts.store')}}" class="form-horizontal form-label-left">

                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <!-----------Category---------------------------->
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="category">Category <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="category" class=form-control col-md-7 col-xs-12">
                                                        <option  value="{{$category->id}}">{{$category->name}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-----------Title---------------------------->
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="title" class="form-control col-md-7 col-xs-12" maxlength="140" data-validate-length-range="6" data-validate-words="2" name="title" placeholder="post title" required="required" type="text">
                                                </div>
                                            </div>

                                            <!-----------Description---------------------------->
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Description">Description <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea id="Description" required="required" name="Description" maxlength="140" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                            </div>

                                            <!-----------Content---------------------------->
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Content <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea id="Content" required="required" name="Content" maxlength="5000" class="form-control col-md-7 col-xs-12"></textarea>
                                                </div>
                                            </div>

                                            <!-----------Tags--------------------------
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Content">Tags <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="input-tags" required="required" name="tags" class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>

                                            <script type="text/javascript" src="selectize.js">
                                                $('#input-tags').selectize({
                                                    delimiter: ',',
                                                    persist: false,
                                                    create: function(input) {
                                                        return {
                                                            value: input,
                                                            text: input
                                                        }
                                                    }
                                                });
                                            </script>-->
                                            <!-----------Image---------------------------->
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">Post Image <span class="required">*</span>
                                                </label>
                                                <div class="btn col-md-6 col-sm-6 col-xs-12">
                                                    <input type="file" id="img"  name="img" accept="image/*" >
                                                </div>
                                            </div>

                                            <!-----------Source---------------------------->
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Image">Source <span class="required">*</span>
                                                </label>
                                                <div class=" col-md-6 col-sm-6 col-xs-12">
                                                    <div class="row btn-group  col-md-6 col-sm-6 col-xs-12" data-toggle="buttons">
                                                        <label class="btn btn-default" onclick="show1();" >
                                                            <input type="radio" name="tab" class="btn btn-default"/>In-source
                                                        </label>
                                                        <label class="btn btn-default" onclick="show2();">
                                                            <input type="radio" name="tab" class="btn btn-default" />Out-Source

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-----------Source script---------------------------->
                                            <script>
                                                function show1(){
                                                    document.getElementById('hidden').style.display ='none';
                                                    document.getElementById('source_url').value ='http://localhost:8000/admin/posts/create';
                                                    document.getElementById('author_name').value ='admin';

                                                }
                                                function show2(){
                                                    document.getElementById('hidden').style.display = 'block';
                                                    document.getElementById('source_url').value ='';
                                                    document.getElementById('author_name').value ='';
                                                }
                                            </script>

                                            <!---------------------------Hidden area ----------------------------------------------------------->
                                            <div id="hidden" style="display: none;">
                                                <!-----------Source URL---------------------------->
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="source_url">Source URL <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input type="url" id="source_url" name="source_url" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <!-----------Author Name---------------------------->
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_name">Author First Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <input id="author_name" type="text" name="author_name" maxlength="70" class="optional form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>


                                            <!-----------active---------------------------->
                                            <div class="item form-group">

                                                <input id="active" type="hidden" name="active" value="1">

                                            </div>

                                    </div>

                                            <!-----------Buttons---------------------------->
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="{{ URL::previous() }}"><button class="btn btn-primary">Cancel</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------ End form ------------------------------------->


                  </div>
                </div>
              </div>
            </div>

			
			
			
              </div>

          


           </div>
        </div>
        <!-- /page content -->

@endsection