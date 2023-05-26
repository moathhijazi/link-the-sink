@extends('admin.app')


@section('head-title' , 'Dashboard')
@section('title' , 'Dashboard')
@section('slug' , 'Dashboard')


@section('content')
    

<div class="row">
    <!-- table card-1 start -->
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-eye text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $visit }}</h5>
                            <span>Visitors</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-user text-c-red mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $users }}</h5>
                            <span>Users</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-file-text text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $cv }} +</h5>
                            <span>CV</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-grid text-c-yellow mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>{{ $posts }}</h5>
                            <span>Post</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget primary card start -->
        <div class="card flat-card" style="border-top : solid 2px red ;">
            <div class="row-table bg-danger">
                <div class="col-sm-3 card-body" style="background : rgb(163, 39, 39) ; ">
                    <i class="feather icon-x text-white mx-auto"></i>
                </div>
                <div class="col-sm-9" style="color : white">
                    <h4 class="text-white">{{ $reject }} +</h4>
                    <h6 class="text-white">Rejected Posts</h6>
                </div>
            </div>
        </div>
        <!-- widget primary card end -->
    </div>
    <!-- table card-1 end -->
    <!-- table card-2 start -->
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-share-2 text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>1000</h5>
                            <span>COMING SOON</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-wifi text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>600</h5>
                            <span>COMING SOON</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-rotate-ccw text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>3550</h5>
                            <span>COMING SOON</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-shopping-cart text-c-blue mb-1 d-blockz"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>100%</h5>
                            <span>COMING SOON</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="col-sm-9">
                    <h4>{{ $accept }}</h4>
                    <h6>Accepted Posts</h6>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <!-- table card-2 end -->



    <!-- prject ,team member start -->
    <div class="col-xl-12 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Admins Table</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>
                                    
                                    Info
                                </th>
                                <th>email</th>
                                <th>added by</th>
                                <th class="text-right">type</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($admins as $admin)
                                <tr>
                                    <td>
                                        
                                        <div class="d-inline-block align-middle">
                                            <img src="{{ url($get( $admin->user_id , 'provider_avatar' ) ) }}" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                            <div class="d-inline-block">
                                                <h6>{{ $get( $admin->user_id , 'provider_username' ) }}</h6>
                                                <p class="text-muted m-b-0">Admin</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $get( $admin->user_id , 'provider_email' ) }}</td>
                                    <td>
                                        @if ($admin->added_by_id == 0)
                                            System
                                        @else
                                            {{ $get( $admin->added_by_id , 'provider_username' ) }}
                                        @endif
                                    </td>
                                    <td class="text-right"><label class="badge badge-light-danger">ADMIN</label></td>
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