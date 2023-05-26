@extends('admin.app')

@section('head-title' , 'users')
@section('title' , 'All Users')
@section('slug' , 'Users')

@section('content')
<div class="row">
    <div id="users-backup"></div>
    <!-- [ basic-table ] start -->
    <div class="col-md-6 col-lg-12">
        
        <div class="card">
            <div class="card-header">
                <h5>Users Table</h5>
                <span class="d-block m-t-5">You have the rights to <span style="color : red ;">Delete</span>  , <span style="color : red">Edit</span> And <span style="color :red">Block</span>   users accounts</span>
            </div>
            <form method="GET" class="form-group" style="padding : 20px;">
                @csrf
                <label for="recipient-name" class="col-form-label">Search:</label>
                <div style="display : flex ; align-items : center ;">
                    <input name="search" type="text" class="form-control"  id="users-search">
                    <button type="submit" style = "height : 44px ; width : 80px; margin : 0 10px;background : #1abc9c ; color : white ; border : solid 1px silver; font-size : 20px ;"><i class="feather icon-search p-2 text-white"></i></button>
                </div>
            </form>
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
                                <th>Message</th>
                                <th>Edit</th>
                                <th>Block</th>
                                <th>Delete</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            

                            @foreach ($users as $user)

                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><img width="30px" style="border-radius : 100%;" src="{{ $user->provider_avatar }}" alt="{{ $user->id }}"></td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->provider_username }}</td>
                                    <td><small>{{ $user->provider_email }}</small></td>
                                    <td><a href="/admin/call-center?id={{ $user->id }}" class="feather icon-message-circle p-2 pointer border"></a></td>
                                    <td><a href="/admin/edit?uid={{ $user->id }}" class="feather icon-edit p-2 pointer border"></a></td>
                                    <td><i onclick="admin_block({{ $user->id }})" class="feather icon-lock p-2 border"></i></td>
                                    <td><i onclick="admin_delete_user({{ $user->id }})" class="feather icon-trash-2 p-2 border text-danger"></i></td>
                                    <td><span class="p-1 border">{{ $user->user_type }}</span></td>
                                </tr>
                              
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection