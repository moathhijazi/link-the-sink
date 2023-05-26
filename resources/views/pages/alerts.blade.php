@extends('pages.app')
@section('title' , 'Notifications')
@section('where' , 'My Alerts')

@section('content')
    
<div class="w-full p-4">
    <div id="alert-backup"></div>
    @if (count($alerts) > 0)
        <div class="w-full flex flex-col-reverse lg:flex-row lg:space-x-4">
            <div class="w-full lg:w-3/4 bg-white py-3">
                @foreach ($alerts as $item)
                    <div class="w-full border-b p-3">
                        <div class="w-full flex justify-between items-center px-4">
                            <h2 class="text-lg text-blue-400 hover:text-black transition">
                            <a href="{{ $item->link }}">
                                {{ $item->title }}
                            </a>
                            </h2>
                            

                                
                        
                               
                               
                           
                            <button onclick="remove_alert({{ $item->id }})" class="py-2 px-6 text-red-500 cursor-pointer  border" >
                                    
                                <span class="font-medium">
                                    Remove
                                    
                                    <i class="fa-solid fa-xmark ml-2"></i>
                                </span>
                                
                                
                            </button>
                          
                           
                        </div>
                        <div class="w-full flex space-x-3 my-2 text-gray-500 px-4">
                            <small class="space-x-1">
                                <i class="fa-solid fa-robot text-xs"></i>

                                <span>System</span>
                            </small>
                            <small class="space-x-1">
                                <i class="fa-regular fa-clock"></i>

                                <span>{{ $item->uploaded_at }}</span>
                            </small>
                            <small class="space-x-1">
                                <i class="fa-solid fa-ticket"></i>

                                <span>{{ $item->id }}</span>
                            </small>
                        </div>
                        <div class="w-full">
                            <p class="text-gray-500 px-4">
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <form method="GET" class="w-full lg:w-1/4 p-3">
                @csrf
                <label for="search" class="font-medium ">Search</label>
                <input type="text" name="search" class="w-full border focus:outline-none mt-3 h-12 px-3 bg-white " >
            </form>
        </div>
       
    @else

    <div class="w-full bg-white p-6">
        <p class="text-center">You dont have a notifications</p>
    </div>
        
    @endif
</div>
@endsection