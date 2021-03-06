@extends('Backend.layout.master')
@section('title','Users')
@section('content')
 <!-- page content -->
 <div  role="main">
            <div class="clearfix"></div>

         <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>

             <!-------------------- search ------------------------------------>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <form action="users/search" method="POST" role="search">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search for user...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>

                    </form>
                </div>
              </div>
             <!-------------------- /search ------------------------------------>
        </div>

              <div class="x_panel">
                  <div class="x_content">
                   <!-- start project list -->
                   <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th>Image</th>
                          <th >Name</th>
                          <th >Email</th>
                          <th>is_admin</th>
                          <th>country</th>
                          <th>Active</th>
                          <th style="width: 15%"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <!---------table row---------->
                      @foreach($users as $key=> $user)
                      
                        <tr>
                          <!--#------> <td>{{$key+1}}</td>
                          <!--Image--> <td> <img src="{{asset('storage/'.$user->img)}}" style="max-width: 100px; height: 50px;"  alt=""> </td>
                          <!--Name------> <td>{{$user->name}}</td>
                          <!--Email--------><td><a>{{$user->email}}</a><br /></td>
                          <!--is_admin------> <td>{{$user->is_admin}}</td>
                          <!--country------> <td><a>{{$user->country}}<a></td>
                          <!--Active------>  <td> 
                          @if($user->active === 1)
                            <button type="button" class="btn btn-success btn-xs">Active</button>        
                          @else
                            <button type="button" class="btn btn-default btn-xs">Passive</button>
                          @endif
                          </td>
                          <td>

                          <a href="{{route('users.edit',$user->id)}}" class="btn btn-info"> Edit </a>
                              <!-- Split button -->
                              <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action</button>


                                  <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="users/{{$user->id}}/active">Active</a>
                                      </li>
                                      <li><a href="users/{{$user->id}}/passive">Passive</a>
                                      </li>
                                  </ul>
                              </div>
                          
                          
                          </td>
                        </tr>
                        <!---------/table row---------->
                       
                      @endforeach
                      
                      
                      </tbody> 
                    </table>
                    <div class="clearfix"></div>
              </div>	  
		   <!------------- /Right side content ------------------------------------------>
		   <!-------------------------------------------------------------------------->

			    <div class="clearfix"></div>
			
            </div>
        </div>

        <!-- /page content -->

 
@endsection