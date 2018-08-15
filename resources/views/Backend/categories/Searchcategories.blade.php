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

    @if(session()->has('details'))
         <div class="alert alert-success alert-dismissible">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Success!</strong> {!! session('details') !!}
         </div>
     @endif


        <div class="page-title">
              <div class="title_left">
                <h3>Categories</h3>
              </div>
        </div>







			   <!-------------------- /post ------------------------------------>
        	  
              <div class="x_panel">
              <div class="x_title">
              <h3>Search results
                    <div class="clearfix"></div>
                  </div>


                <div class="x_content">
                   <!-- start project list -->
                   <table class="table table-striped projects">
                   
                      <!---------table row---------->
                      @if(isset($details))

                      
                          <p> The Search results for your query <b> {{ $query }} </b> are :</p>
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

                      @foreach($details as $key=> $category)
                      
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
                       
                           <!---------table row---------->
                      @else
                     
                      <p><b>No results</b></p>

                       
                        @endif
                        <!---------/table row---------->

                     
                      
                      </tbody>
                     
                    </table>
                    <div class="clearfix"></div>
              </div>	  

			    <div class="clearfix"></div>
			
            </div>
        </div>

        <!-- /page content -->

 
@endsection