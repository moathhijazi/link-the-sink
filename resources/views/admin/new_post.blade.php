@extends('admin.app')

@section('head-title' , 'Add post')
@section('title' , 'Post')
@section('slug' , 'New Post')


@section('content')
<div class="row">
    <!-- [ demo-modal ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Add New Post</h5>
            </div>
            <div class="card-body">
                <div>
                   
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="post-title">
                    </div>
                   
                    

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="post-text"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Link:</label>
                        <input type="text" class="form-control" id="post-link">
                    </div>

                    <button type="button" onclick=" admin_post() " class="btn  btn-primary" data-toggle="modal" data-target="#exampleModalLive">Send message</button>
                </div>
                <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLiveLabel">New post sent !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Your post added successfuly!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  btn-primary" data-dismiss="modal">Close</button>
                              
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- [ demo-modal ] end -->
    
  
    
</div>
@endsection