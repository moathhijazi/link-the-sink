@extends('pages.app')
@section('title' , 'users')
@section('where' , 'Jobseekers')

@section('content')
    <div class="w-full p-4">

        @if (count($users) > 0)
            <div class="w-full flex flex-col-reverse lg:flex-row lg:space-x-4">
                <div class="w-full lg:w-3/4 bg-white py-3">
                    @foreach ($users as $item)
                        <div class="w-full border-b p-3 " style="height : 180px">
                            <div class="flex items-center h-full justify-between">
                                <img class="rounded-full ml-3" src="{{ $item->provider_avatar }}" width = "130px" alt="profile">
                                <div class="h-full w-3/4">
                                    <div class="w-full flex justify-between items-center">
                                        <h2 class="text-lg text-blue-400 hover:text-black transition">
                                        <a href="/sink/{{ $item->provider_username }}">
                                            {{ $item->provider_username }}
                                        </a>
                                        </h2>
                                        <button onclick="location.href = '{{ $get($item->id , 'linkedin_link') }}'  " class="py-2 px-6 text-white hover:opacity-80 transition " style="background : var(--blue) ; " >
                                            <span>
                                                Contact
                                                
                                                <i class="fa-solid fa-paper-plane ml-2"></i>
                                            </span>
                                            
                                            
                                        </button>
                                    </div>
                                    <div class="w-full flex space-x-3 my-2 text-gray-500">
                                        <small class="space-x-1">
                                            <i class="fa-solid fa-user text-xs"></i>
        
                                            <span>{{ $item->first_name .' '. $item->last_name }}</span>
                                        </small>
                                        <small class="space-x-1">
                                            <i class="fa-regular fa-clock"></i>
        
                                            <span>{{ $item->uploaded_at }}</span>
                                        </small>
                                        
                                    </div>
                                    <div class="w-full">
                                        <p class="text-gray-500">
                                            {{ $item->provider_email }}
                                        </p>
                                    </div>
                                    <div class="w-full mt-4">
                                        <p class="text-gray-500">
                                            {{ $get($item->id , 'bio') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <form method="GET" class="w-full lg:w-1/4 p-3">
                    @csrf
                    <label for="search" class="font-medium ">Search</label>
                    <input type="text" name="search" class="w-full border focus:outline-none mt-3 h-12 px-3 bg-white " placeholder="Search for Skills or Names" >
                </form>
            </div>
           
        @else

        <div class="w-full bg-white p-6">
            <p class="text-center">There are no jobseekers to show !</p>
        </div>
            
        @endif
    </div>
@endsection
