@extends('Backend.layout.master')
@section('title','Edit Category')
@section('content')
    <!-- page content -->
    <div  role="main">
        <div class="clearfix"></div>

        <!--------------------------------------------------------------------------->
        <!------------- Left side content ------------------------------------------>

							@if ($errors->has('name'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $errors->first('name') }}
                                </div>

                            @endif


                            @if ($errors->has('img'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ $errors->first('img') }}
                                </div>

                            @endif
        <!-------------------- /post ------------------------------------>

        <div class="x_panel">
            <div class="x_title">
              <h4>
                <a href="{{route('categories.index')}}">Categories</a> >
                <a href="{{route('categories.show',$category->id)}}">{{$category->name}}</a> >
                Edit
              </h4>
                <div class="clearfix"></div>
            </div>


            <div class="x_content">
                <!-- start project list -->
                 <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data"  action="{{route('categories.update',$category->id)}}" novalidate>

                                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                                    <input name="_method" value="PUT" type="hidden">

                                                    <!--view Image---------------->
                                                    <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="category">Image <span class="required">*</span></label>
                                                        <img src="{{asset('storage/' . $category->img)}}" class="col-md-6 col-sm-6 col-xs-12" alt="{{$category->img}}">
                                                        <input type="hidden" id="img2" name="img2" value="{{$category->img}}" >

                                                    </div>

                                                    <!--upload Image---------------->
                                                    <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="file" id="img" name="img" accept="image/*" required="required" class="form-control col-md-7 col-xs-12">

                                                        </div>
                                                    </div>

                                                    <!--name---------------->
                                                    <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id="name" class="form-control col-md-7 col-xs-12" value="{{$category->name}}" maxlength="50"  name="name" placeholder="category name" type="text" required >
                                                        </div>
                                                    </div>

                                                    <!--active---------------->
                                                    <div class="item form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="category">Active <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select name="active" class=form-control col-md-7 col-xs-12">
                                                            @if($category->active === 1)
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
                                                            <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
                                                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>


                <div class="clearfix"></div>

            </div>
            <!------------- /Right side content ------------------------------------------>
            <!-------------------------------------------------------------------------->

            <div class="clearfix"></div>

        </div>
    </div>

    <!-- /page content -->


@endsection