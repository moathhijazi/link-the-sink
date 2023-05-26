@extends('admin.app')

@section('head-title' , 'Add new user')
@section('title' , 'Users')
@section('slug' , 'New user')


@section('content')
<div class="row">
    <!-- [ demo-modal ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Create New User</h5>
            </div>
            <div class="card-body">
                <div>
                   
                    
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">First name:</label>
                        <input type="text" class="form-control" id="first">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Last name:</label>
                        <input type="text" class="form-control" id="last">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                   
                    

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Bio:</label>
                        <textarea class="form-control" id="bio"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Linkedin Link:</label>
                        <input type="text" class="form-control" id="linkedin">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Github Link:</label>
                        <input type="text" class="form-control" id="github">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Account type:</label>
                        <select type="text" class="form-control" id="type">

                            <option value="new" selected>New</option>
                            <option value="verified">Verified</option>
                            <option value="jobseeker">Jobseeker</option>
                            <option value="employer">Employer</option>
                            
                            
                        </select>
                    </div>
                    <div class="form-group">
                       
                        <div class="new-user-backup" id="inner-new-user" style="color : red ;font-weight : 600;">
                            
                        </div>
                        
                    </div>
                    <button type="button" class="btn  btn-primary" onclick="admin_new_user()">Create</button>
                </div>
                
                
            </div>
        </div>
    </div>
    <!-- [ demo-modal ] end -->
    
  
    
</div>
@endsection