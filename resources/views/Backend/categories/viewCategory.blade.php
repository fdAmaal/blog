@extends('Backend.layout.master')
@section('title','View Category')
@section('content')
 <!-- page content -->
 <div  role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Category Name</h3>
              </div>
			<!---------------search ---------------------------------------->
              <div class="title_right">
              
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
			  
            </div>
            
            <div class="clearfix"></div>

			
            <div class="">
			 <!--------------------------------------------------------------------------->
			 <!------------- Left side content ------------------------------------------>
              <div class="col-md-8 col-lg-8 col-sm-7">
			  
 
			   <!-------------------- /post ------------------------------------>	  
              <div class="x_panel">
                <div class="x_title">
                  <h2>Daily active title <span><a class="close-link"><i class="fa  fa-external-link"></i></a></span> <small>3 mins ago</small></h2>
                     <ul class="nav navbar-right panel_toolbox">
                     
					   <div class="btn btn-success" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">
                        Sport
                      </div>
                    </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>300*500</h1>
                     </div>
					 
					  <div class="profile_pic" >
						<img style="max-width: 50px; height: 50px;" src="images/img.jpg" alt="..." class="img-circle">
							<span>Author,</span> 
						</div>
 
						<br/>
                        <p class="message"><br/><br/><br/>
                          Film festivals used to be do-or-die moments for movie makers. They were where... <span><a href="">Read More</a></span>
                        </p> 

                  </div>
                </div>
              </div>
			   <!-------------------- /post ------------------------------------>
		
			 </div>
		   <!------------- /Left side content ------------------------------------------->
		   <!--------------------------------------------------------------------------->
		   








		   
		   <!--------------------------------------------------------------------------->
		   <!------------- Right side content ------------------------------------------>
		   <div class="col-md-4 col-lg-4 col-sm-5">

      		   
		   <!-------------- new post -------------------------------------------->
		
                  <div class="x_content">
                  <a href="newPost"><button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="center">
                      <h3> New Post </h3>
                      </button></a>
                
         </div>
			<!------------ /new post --------------------------------------------->



		   <!-------------- tags -------------------------------------------->
			  <div class="x_panel">
                  <div class="x_title">
                    <h2>Tags</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start pop-over -->
                    <div class="bs-example-popovers">
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">
                        Left
                      </button>
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">
                        Top
                      </button>
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Bottom
                      </button>
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Right
                      </button>
                    </div>
                    <!-- end pop-over -->
                  </div>
                </div>
			<!------------ /tags --------------------------------------------->
				
						<!-------------- Categories -------------------------------------->
			  <div class="x_panel">
                  <div class="x_title">
                    <h2>Categories </h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Add small overlays of content for housing secondary information.</p>
                    <!-- start pop-over -->
                    <div class="bs-example-popovers">
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">
                        Left
                      </button>
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">
                        Top
                      </button>
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Bottom
                      </button>
                      <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Right
                      </button>
                    </div>
                    <!-- end pop-over -->
                  </div>
                </div>
			<!------------ /Categories --------------------------------------->
              </div>	  
		   <!------------- /Right side content ------------------------------------------>
		   <!-------------------------------------------------------------------------->
		   
			
            

            </div>
			    <div class="clearfix"></div>
			
            </div>
        </div>
        <!-- /page content -->

 
@endsection