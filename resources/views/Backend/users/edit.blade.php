@extends('Backend.layout.master')
@section('title','Posts')
@section('content')
 <!-- page content -->
 <div  role="main">
            <div class="clearfix"></div>

        	  
              <div class="x_panel">
                  <div class="x_content">
                   <!-- start project list -->
                      <!---------edit form  -------------------------------------------------------------------------------------------------------------->
                      <form class="form-horizontal form-label-left" method="post"  action="{{route('users.update',$user->id)}}"" novalidate>
                          @csrf
                          <input name="_method" value="PUT" type="hidden">

                          <!--Image---------------->
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="category">Image <span class="required">*</span></label>
                          <img src="{{asset('storage/img/'.$user->img)}}" style="max-width: 150px; height: 100px;" class="col-md-6 col-sm-6 col-xs-12" alt="{{$user->img}}">
                      </div>


                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">Image <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="img" class="form-control col-md-7 col-xs-12" value="{{$user->img}}" data-validate-words="1" name="img" placeholder="upload image" required="required" type="text">
                          </div>
                      </div>

                      <!--name---------------->
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input id="name" class="form-control col-md-7 col-xs-12" value="{{$user->name}}" data-validate-words="1" name="name" placeholder="category name" required="required" type="text">
                              </div>
                          </div>

                      <!--Email---------------->
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">Email <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="Email" name="Email" value="{{$user->email}}" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>

                      <!--Country---------------->
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">Country <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="country" name="country" value="{{$user->country}}" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                          </div>

                      <!--Admin---------------->
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="admin">Admin <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="admin" class=form-control col-md-7 col-xs-12">
                                  <option  value="1">Admin</option>
                                  <option  value="0">User</option>
                                  </select>
                              </div>
                          </div>

                      <!------Active---------------->
                          <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="active">Active <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <select name="active" class=form-control col-md-7 col-xs-12">
                                  <option  value="1">Active</option>
                                  <option  value="0">Passive</option>
                                  </select>
                              </div>
                          </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-3">
                                  <a href="posts"><button  class="btn btn-primary">Cancel</button></a>
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