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
				  
                  <div class="x_content">
                    <br />
					
                            <div>

                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                  <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="post-tab">

<!----------------------------------------------------------------------------------------------------------------------->
                                    <form class="form-horizontal form-label-left" method="post" enctype="multipart/form-data" action="{{route('categories.store')}}">

                                        <input type="hidden" name="_token" value="{{csrf_token()}}">








                                        <!--------Name--------------------->
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input id="name" class="form-control col-md-7 col-xs-12" maxlength="50" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="category name" required="required" type="text">
                                            </div>
                                              <p id="demo"></p>


                                            <!--------Image------------------->
                                          </div>
                                          <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="img">Image <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="file" id="img" name="img" accept="image/*" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                          </div>

                                        <!---------Buttons ------------------------->
                                          <div class="ln_solid"></div>
                                          <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                              <a href="posts"><button  class="btn btn-primary">Cancel</button></a>
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