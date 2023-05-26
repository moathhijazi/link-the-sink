@extends('admin.app')

@section('head-title' , 'Add New Admin')
@section('title' , 'Admin')
@section('slug' , 'Add new admin')


@section('content')
<div class="row">
    <!-- [ demo-modal ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Add New Admin</h5>
            </div>
            <div class="card-body">
                <div>
                   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Search:</label>
                        <div style="display : flex ; align-items : center ;">
                            <input type="text" class="form-control"  id="users-search">
                            <button onclick=" search_users_for_hire() " style = "height : 44px ; width : 80px; margin : 0 10px;background : #1abc9c ; color : white ; border : solid 1px silver; font-size : 20px ;"><i class="feather icon-search p-2 text-white"></i></button>
                        </div>
                    </div>
                   
                

                    
                </div>
                
                <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLiveLabel">Confirm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Are you sure to add 1 user as <code>ADMIN</code></p>
                                <p class="mb-0">remember that you dont have a permission to remove other admins !</p>
                                <input type="hidden" id="user-id" >
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-primary text-white" data-dismiss="modal" onclick="admin_new_admin()">I understand , and im sure</button>
                                <button type="button" class="btn  btn-secondary" data-dismiss="modal" onclick="remove_new_admin_id()" >Close</button>
                              
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-6 col-lg-12">
                <div class="card">
                   
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Img</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>option</th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="inner-table">
                                    @foreach ($users as $user)
                                        <tr>

                                            <td>{{ $user->id }}</td>
                                            <td><img width = "30px" style="border-radius : 100%; " src="{{ $user->provider_avatar }}" alt="{{ $user->id }}"></td>
                                            <td>{{ $user->first_name }}</td>
                                            <td>{{ $user->last_name }}</td>
                                            <td>{{ $user->provider_username }}</td>
                                            <td><small>{{ $user->provider_email }}</small></td>
                                            @if ($check($user->id))

                                                <td><a class="p-2 border text-danger" >Admin</a></td>
                                            @else
                                                <td><a onclick="add_user_to_confirm({{ $user->id }})" type="button" class="p-2 border text-primary" data-toggle="modal" data-target="#exampleModalLive">Hire</a></td>
                                                
                                            @endif
                                            
                                            
                                        </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ demo-modal ] end -->
    
  
    
</div>
@endsection