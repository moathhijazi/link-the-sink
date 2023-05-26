@extends('admin.app')

@section('head-title' , 'Posts Requests')
@section('title' , 'Requests')
@section('slug' , 'Requests')


@section('content')
<div class="row">
    <div id="requests-backup"></div>
    <!-- [ card ] start -->
    {{-- <div class="col-md-6 col-xl-4">
        <h5>Body Content</h5>
        <hr>
        <div class="card">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div>
    </div> --}}
    
    
    <div class="col-12">
        <h5 class="mt-4">Posts Requests</h5>
        <hr>
        <div class="card-columns w-full">

            @if (count($posts) > 0 )
                @foreach ($posts as $req)
                <div class="card w-full">
                
                    <div class="card-body">
                        <h5 class="card-title">{{ $req -> title }}</h5>
                        <p class="card-text"> {{ $req -> description }} </p>
                        <button class="btn  btn-primary" onclick=" admin_accept_post({{ $req->id }}) ">Accept</button>
                        <button class="btn  btn-danger" onclick=" admin_reject_post({{ $req->id }}) ">Reject</button>
                    </div>
                </div>
                @endforeach
            @else
            <div class="card w-full">
                
                <div class="card-body">
                    <h5 class="card-title">There is no request to display!</h5>                    
                </div>
            </div>
            @endif
           

            
        </div>
    </div>
    <!-- [ card ] end -->
</div>
@endsection