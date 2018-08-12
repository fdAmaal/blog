@extends('Backend.layout.master')

@section('title','New Category')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>New Category</h2>
                                <div class="clearfix"></div>
                            </div>

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

                            <div class="x_content">
                                <br />


                                <!------------  form ------------------------------------->
                                <div>
                                    <form method="post" enctype="multipart/form-data"  action="{{route('categories.store')}}" class="form-horizontal form-label-left" novalidate>

                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


                                        <!-----------Title---------------------------->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="name" class="form-control col-md-7 col-xs-12" maxlength="50" name="name" placeholder="category name" required="required" type="text">
                                            </div>
                                        </div>

                                        <!-----------Image---------------------------->
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">Category Image <span class="required">*</span>
                                            </label>
                                            <div class="btn col-md-6 col-sm-6 col-xs-12">
                                                <input type="file" id="img"  name="img" accept="image/*" >
                                                <input type="hidden" value="1" name="active"/>
                                            </div>
                                        </div>


                                        <!-----------Buttons---------------------------->
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">

                                                <a class="btn btn-primary" href="{{route('categories.index')}}">Cancel</a>
                                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>


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