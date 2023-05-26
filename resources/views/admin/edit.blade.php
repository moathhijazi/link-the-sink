@extends('admin.app')

@section('head-title' , 'Edit')
@section('title' , 'Edit')
@section('slug' , 'users table / Edit user')


@section('content')
<div class="row">
    <!-- [ demo-modal ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit users information</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update') }}">
                   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">First name:</label>
                        <input type="text" name="edit-first" class="form-control" id="edit-first" value="{{ $user->first_name }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Last name:</label>
                        <input type="text" name="edit-last" class="form-control" id="edit-last" value="{{ $user->last_name }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" name="edit-username" class="form-control" id="edit-username" value="{{ $user->provider_username }}">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" name="edit-email" class="form-control" id="edit-email" value="{{ $user->provider_email }}">
                    </div>
                   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Type:</label>
                        <select name="edit-type" id=""class="form-control" id="edit-type" value="{{ $user->user_type }}">
                            <option value="verified" selected>Select user type (Default verified)</option>
                            <option value="jobseeker">Jobseeker</option>
                            <option value="employer">Employer</option>
                        </select>
                    </div>
                   
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button type="submit" class="btn  btn-primary">Update</button>
                </form>
                
                
            </div>
        </div>
    </div>
    <!-- [ demo-modal ] end -->
    
  
    
</div>
@endsection