@extends('pages.app')
@section('title' , 'My posts')
@section('where' , 'My posts')

@section('content')
    <div class="w-full p-4">
        <div id="own-backup"></div>
        @if (count($posts) > 0)
            <div class="w-full flex flex-col-reverse lg:flex-row lg:space-x-4">
                <div class="w-full lg:w-3/4 bg-white py-3">
                    @foreach ($posts as $item)
                        <div class="w-full border-b p-3">
                            <div class="w-full flex justify-between items-center">
                                <h2 class="text-lg text-blue-400 hover:text-black transition">
                                <a href="/hire/{{ $item->id }}">
                                    {{ $item->title }}
                                </a>
                                </h2>
                                <button class="py-2 px-6 text-white hover:opacity-80 transition bg-red-500" onclick="deletePost('{{ $item->id }}')">
                                    <span>
                                        Delete
                                        
                                        <i class="fa-solid fa-trash ml-2"></i>
                                    </span>
                                    
                                    
                                </button>
                            </div>
                            <div class="w-full flex space-x-3 my-2 text-gray-500">
                                <small class="space-x-1">
                                    <i class="fa-solid fa-user text-xs"></i>

                                    <span>{{ $_SESSION['user']['username'] }}</span>
                                </small>
                                <small class="space-x-1">
                                    <i class="fa-regular fa-clock"></i>

                                    <span>{{ $item->uploaded_at }}</span>
                                </small>
                                <small class="space-x-1">
                                    <i class="fa-solid fa-ticket"></i>

                                    <span>12</span>
                                </small>
                            </div>
                            <div class="w-full">
                                <p class="text-gray-500">
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
            <p class="text-center">You dont have a posts</p>
        </div>
            
        @endif
    </div>
@endsection

