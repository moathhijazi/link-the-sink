@extends('pages.app')
@section('title' , 'All posts')
@section('where' , 'JOB POSTS')

@section('content')
    <div id="posts-backup">
        @include('components.posts')
    </div>
@endsection

