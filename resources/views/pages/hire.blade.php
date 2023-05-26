@extends('pages.app')
@section('title' ,  $post->title  )
@section('where' , 'own/' . $post->title  )

@section('content')
    <div class="w-full p-4">
        <div id="hire-backup"></div>
       
            <div class="w-full flex flex-col-reverse lg:flex-row lg:space-x-4">
                <div class="w-full lg:w-3/4 bg-white py-3">
                    
                        <div class="w-full border-b p-3">
                            <div class="w-full flex justify-between items-center">
                                <h2 class="text-lg text-blue-400 hover:text-black transition">
                                <a href="/show/{{ $post->id }}">
                                    {{ $post->title }}
                                </a>
                                </h2>
                                <button class="py-2 px-6 text-white hover:opacity-80 transition " onclick="location.href = '/show/{{ $post->id }}' " style="background : var(--blue)">
                                    <span>
                                        Show
                                        
                                        <i class="fa-solid fa-share ml-2"></i>
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

                                    <span>{{ $post->uploaded_at }}</span>
                                </small>
                                <small class="space-x-1">
                                    <i class="fa-solid fa-ticket"></i>

                                    <span>12</span>
                                </small>
                            </div>
                            <div class="w-full">
                                <p class="text-gray-500">
                                    {{ $post->description }}
                                </p>
                            </div>
                        </div>
                        <div class="w-full border-b p-2">
                            <h2 class="text-center font-medium text-xl text-gray-500">Applies</h2>
                        </div>
                        @if (count($applies) > 0 )
                            @foreach ($applies as $apply)

                            <div class="w-full p-2">
                                <div class="w-full border-b flex p-2 justify-between items-center">
                                    <div class="flex space-x-5 items-center">
                                        <img src="{{ $get($apply->apply_from , 'provider_avatar')}}" class="rounded-full" width="80px" alt="profile-image">
                                        <div class="flex flex-col">
                                            <a href="/sink/{{ $get($apply->apply_from , 'provider_username') }}" class="text-lg text-blue-500 font-medium hover:text-gray-500 transition">
                                                {{ $get($apply->apply_from , 'provider_username')}}
                                            </a>
                                            <span class="text-sm text-gray-500">
                                                {{ $info($apply->apply_from , 'bio')}}
                                            </span>
                                            <small class="text-gray-400">
                                                {{ $apply->uploaded_at }}
                                            </small>
                                        </div>
                                    </div>
    
                                   <div class="flex flex-col space-y-2">
                                    <a class="py-2 px-6 text-white hover:opacity-80 transition cursor-pointer" style="background : var(--blue)" href="{{ url( $info($apply->apply_from , 'cv_path') ) }}">
                                        <span>
                                            CV
                                            
                                            <i class="fa-solid fa-file ml-4"></i>
                                        </span>
                                        
                                        
                                    </a> 
                                    <button class="py-2 px-6 text-white hover:opacity-80 transition " onclick="location.href = '{{ $info($apply->apply_from , 'linkedin_link')}}' " style="background : var(--blue)">
                                        <span>
                                            Contact
                                            
                                            <i class="fa-brands fa-linkedin ml-2"></i>
                                        </span>
                                        
                                        
                                    </button> 
                                    <button onclick="remove_own_apply({{ $apply->id }})" class="py-2 px-6 text-white hover:opacity-80 transition bg-red-500" onclick="">
                                        <span>
                                            Remove
                                            
                                            <i class="fa-solid fa-xmark ml-2"></i>
                                        </span>
                                        
                                        
                                    </button>
                                   </div>
                                </div>
                            </div>
                                
                            @endforeach
                        @else
                            <div class="w-full p-4">
                                <p class="text-center font-medium text-gray-400">
                                    No applies to your post yet !
                                </p>
                            </div>
                        @endif


                        
                        
                   
                </div>
                <div class="w-full lg:w-1/4 p-3">
                    <label for="search" class="font-medium ">Search</label>
                    <input type="text" name="search" class="w-full border focus:outline-none mt-3 h-12 px-3 bg-white " >
                </div>
            </div>
           
     

        
            
     
    </div>
@endsection

