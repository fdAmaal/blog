@extends('Backend.layout.master')
@section('title','Users')
@section('content')
 <!-- page content -->
 <div  role="main">
            <div class="clearfix"></div>


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
                          <th>Remember Token</th>
                          <th>ip_address</th> 
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
                          <!--Image--> <td> <img src="" style="max-width: 100px; height: 50px;"  alt=""> </td>
                          <!--Name------> <td>{{$user->img}}</td>
                          <!--Email--------><td><a>{{$user->email}}</a><br /></td>
                          <!--Remember Token--><td>{{$user->remember_token}} </td>
                          <!--ip_address------> <td>{{$user->ip_address}}</td>
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