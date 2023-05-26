@extends('pages.app')
@section('title' , 'Show')
@section('where' , $post->title)

@section('content')
<div id="show-backup"></div>
<div class="flex flex-col md:flex-row space-x-4">
    
    <div   class="w-full md:w-3/4 p-6 bg-white mb-12">

        <div class="w-full border-b">
            <h2 class="text-2xl text-gray-600 p-3">
                {{ $post->title }}
            </h2>
        </div>
        <div class="w-full p-3">
            <p class="text-gray-700">
                {{ $post->description }}
            </p>
        </div>
        @if ($post->link != null)
            <div class="w-full p-3">
                <a href="{{ url( $post->link ) }} " target="tab" class="text-blue-700">
                    {{ $post->link }}
                </a>
            </div>
        @endif
       
        
        <div class="my-3">
           
            @if ($check($post->id))
            <button onclick="show_apply({{ $post->id }})" class="py-2 px-6 text-blue-500 border hover:opacity-80 transition " >
                
                <span>
                    Remove apply
                    
                    <i class="fa-solid fa-xmark ml-2"></i>
                </span>
                
                
            </button>
            @else
                @if ($_SESSION['account'] == 'joobseeker')
                    <button onclick="show_apply({{ $post->id }})" class="py-2 px-6 text-white hover:opacity-80 transition bg-red-500" style="background : var(--blue)">
                        
                        <span>
                            Apply
                            
                            <i class="fa-solid fa-check ml-2"></i>
                        </span>
                        
                        
                    </button>
                @endif
            
            @endif
            
        </div>
    </div>
    <div style="max-height : 300px;"  class="w-full md:w-1/4 p-6 bg-white mb-12 flex md:flex-col md:space-y-3 items-center justify-center space-x-5">
        <img width="150px" src="{{ url($get($post->from_user_id , 'provider_avatar')) }}" class="rounded-full" alt="{{ $get($post->from_user_id , 'provider_username') }}">
        <div class="flex flex-col md:item-center">
            <h2 class="text-xl ">{{ $get($post->from_user_id , 'provider_username') }}</h2>
            <small class="font-medium text-gray-500">{{ $post->uploaded_at }}</small>
        </div>
    </div>

</div>
    
@endsection