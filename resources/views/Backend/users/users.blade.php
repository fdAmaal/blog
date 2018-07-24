@extends('Backend.layout.master')
@section('title','Users')
@section('content')
 <!-- page content -->
 <div  role="main">
            <div class="clearfix"></div>

     <h4>
         Users
       
     </h4>

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
                                  @if($user->active === 1)
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Active</button>
                                  @else
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Passive</button>
                                  @endif

                                  <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                      <li><a href="/admin/users/{{$user->id}}/active">Active</a>
                                      </li>
                                      <li><a href="/admin/users/{{$user->id}}/passive">Passive</a>
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