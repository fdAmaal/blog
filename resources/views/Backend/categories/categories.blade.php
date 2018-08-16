@extends('Backend.layout.master')
@section('title','Categories')
@section('content')
 <!-- page content -->


 <div  role="main">
            <div class="clearfix"></div>


     @if(session()->has('message.level'))
         <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success!</strong> {!! session('message.content') !!}
         </div>


     @endif


     @if(session()->has('Activated'))
         <div  class="alert alert-info alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Warning!</strong>  Category Activated successfully
         </div>

     @endif

     @if(session()->has('disactivated'))
         <div class="alert alert-info alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Warning!</strong>  Category Disctivated successfully
         </div>
     @endif

        <div class="page-title">
              <div class="title_left">
                <h3>Categories</h3>
              </div>

             <!-------------------- search ------------------------------------>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form action="categories/search" method="POST" role="search">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search for category...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>

                    </form>
                </div>
              </div>

        </div>







			   <!-------------------- /post ------------------------------------>
        	  
              <div class="x_panel">
              <div class="x_title">
              <a href="{{route('categories.create')}}"><button type="button" class="btn btn-danger btn-lg">New Category</button><a>
                    <div class="clearfix"></div>
                
            

                  </div>


                <div class="x_content">
                   <!-- start project list -->
                   <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th>Image</th>
                          <th >Name</th>   
                          <th>Active</th>
                          <th style="width: 20%"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <!---------table row---------->
                
                      @foreach($categories as $key=> $category)
                      
                        <tr>
                          <!--#------> <td>{{$key+1}}</td>
                          <!--Image--> <td> <img src="{{asset('storage/' . $category->img)}}" style="max-width: 100px; height: 50px;"  alt="{{$category->img}}"> </td>
                          <!--Name------> <td>{{$category->name}}</td>
                          <!--Active------>  <td> 
                          @if($category->active === 1)
                            <button type="button" class="btn btn-success btn-xs">Active</button>
                          @else
                            <button type="button" class="btn btn-default btn-xs">Passive</button>
                          @endif
                          </td>
                          <td>
                          <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info"> Edit </a>
                          <a href="{{route('categories.show',$category->id)}}" class="btn btn-danger"> view </a>
                              <!-- Split button -->
                              <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>


                                  <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="categories/{{$category->id}}/active">Active</a>
                                      </li>
                                      <li><a href="categories/{{$category->id}}/passive">Passive</a>
                                      </li>
                                  </ul>
                              </div>


                          </td>
                        </tr>
                        @endforeach
                        <!---------/table row---------->
                       
                       
                     
                      
                      </tbody>
                       {{$categories->links()}}
                    </table>
                    <div class="clearfix"></div>
              </div>	  

			    <div class="clearfix"></div>
			
            </div>
        </div>

        <!-- /page content -->

 
@endsection