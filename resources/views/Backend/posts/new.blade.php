@extends('Backend.layout.master')
@section('title','New Post')
@section('content')
    <!-- page content -->
    <div  role="main">
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
                                    <div>

                                        <form method="post" enctype="multipart/form-data"  action="{{route('posts.store')}}" class="form-horizontal form-label-left">

                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <!-----------Category---------------------------->
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="category">Category <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <select name="category" class=form-control col-md-7 col-xs-12">
                                                    @foreach($categories as $key=> $category)

                                                        <option  value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach

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
                                                    <input type="file" id="img"  name="img" required="required" accept="image/*" >
                                                </div>
                                            </div>

                                            <!-----------Source---------------------------->
                                            <div class="item form-group" onload="show1()">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Source">Source <span class="required">*</span>
                                                </label>

                                                    <div class="row btn-group col-md-6 col-sm-6 col-xs-12" data-toggle="buttons">
                                                        <label class="btn btn-default" onclick="show1();">
                                                             <input type="radio" name="Source" id="InSource"> In-Source
                                                        </label>
                                                        <label class="btn btn-default" onclick="show2();">
                                                             <input type="radio" name="Source" id="OutSource"> Out-Source
                                                        </label>
                                                    </div>
                                               
                                            </div>

                                            <!-----------Source script---------------------------->
                                            <script>

                                                function show1(){
                                                    document.getElementById('hidden').style.display ='none';
                                                    document.getElementById('source_url').value ='https://hubapps.mobi/scripts/blog/public/home/';
                                                    document.getElementById('author_name').value ='admin';
                                                    document.getElementById('author_img').value ='';


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
                                                        <input type="url" id="source_url" name="source_url" required="required" placeholder="www.website.com" value ='https://hubapps.mobi/scripts/blog/public/home/' class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <!-----------Author Name---------------------------->
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_name">Author Name <span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="author_name" type="text" name="author_name" value="admin" required="required" maxlength="70" class="optional form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>

                                                <!-----------Author Image---------------------------->
                                                <div class="item form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="author_img">Author Image 
                                                    </label>
                                                    <div class="btn col-md-6 col-sm-6 col-xs-12">
                                                        <input type="file" id="author_img"  name="author_img" accept="image/*" >
                                                       
                                                    </div>
                                                </div>



                                                <!-----------active---------------------------->
                                            <div class="item form-group">

                                                <input id="active" type="hidden" name="active" value="1"/>
                                                <input style="visibility:hidden;"  type="text" name="img2" value="{{Auth::user()->img}}"/>
                                                      

                                            </div>

                                    </div>

                                            <!-----------Buttons---------------------------->
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <a class="btn btn-primary" href="{{ URL::previous() }}">Cancel</a>
                                                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                     </div>
									<!------------ End form ------------------------------------->

                <div class="clearfix"></div>

            </div>
            <div class="clearfix"></div>

        </div>
    </div>

    <!-- /page content -->


@endsection