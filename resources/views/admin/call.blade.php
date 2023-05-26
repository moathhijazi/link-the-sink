@extends('admin.app')

@section('head-title' , 'call center')
@section('title' , 'Call center')
@section('slug' , 'message users')

@section('content')
<div class="row">
    <!-- [ demo-modal ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Message to user</h5>
            </div>
            <div class="card-body">

                <div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">To ID:</label>
                        <input type="text" class="form-control" id="message-id" value="{{ $id }}">
                        <small id="call-backup" style="color : red ;"></small>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" autofocus id="message-title">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <button onclick="admin_message()" type="button" class="btn  btn-primary" data-toggle="modal" data-target="#exampleModalLive">Send message</button>
                </div>
                <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLiveLabel">Message sent !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Your message has been sent successfuly!</p>
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
    
  
    <!-- [ vertically-modal ] end -->
    
</div>
@endsection