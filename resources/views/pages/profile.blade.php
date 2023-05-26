@extends('pages.app')
@section('title' , 'Profile')
@section('where')

{{ $user->provider_username }}

@endsection 
    

@section('content')
    <div class="flex flex-col-reverse mb-14">

        <div class="w-full bg-white p-3 mr-2">

            <div class="w-full flex justify-center space-x-5">
                <a class="text-blue-400 space-x-3" href="{{ $get($user->id , 'linkedin_link') }}">LinkedIn <i class="fa-brands fa-linkedin"></i></a>
                <a class="text-blue-400 space-x-3" href="{{ $get($user->id , 'github_link') }}">Github <i class="fa-brands fa-github"></i></a>
            </div>
        
            

        </div>
        <div class="w-full bg-white p-3 mr-2 mt-4 border-b border-gray-300">

            <div class="w-full flex justify-center">
                <p class="font-medium text-gray-600">
                    Social media
                </p>
            </div>
        
            

        </div>
        <div class="w-full bg-white p-3 mr-2">

            <div class="w-full flex justify-start space-x-2">
                
                @if (count($skills) > 0)
                    @foreach ($skills as $skill)
                    <button  class="py-2 px-6 text-white cursor-default transition mt-3" style="background : var(--blue) ;">
                        <span>
                            {{ $skill->skill }}
                            
                            <i class="fa-solid fa-tag ml-2"></i>
                        </span>
                        
                        
                    </button>
                    @endforeach
                @else 
                <p class="p-2">
                    <span class="font-light"><span class="font-medium">{{ $user->provider_username }}</span> .  doesnt have skills </span>
                </p>
                @endif
                
            </div>
        
            

        </div>
        <div class="w-full bg-white p-3 mr-2 mt-4 border-b border-gray-300">

            <div class="w-full flex justify-center">
                <p class="font-medium text-gray-600">
                    Skills
                </p>
                

            </div>
        
            

        </div>
        <div class="w-full bg-white p-3 mr-2">

            <div class="w-full flex justify-center">
                <p>
                    {{
                        $get($user->id , 'bio')
                    }}
                </p>
            </div>
        
            

        </div>

        <div class="w-full bg-white p-3 mr-2 mt-4 border-b border-gray-300">

            <div class="w-full flex justify-center">
                <p class="font-medium text-gray-600">
                    Bio
                </p>
            </div>
        
            

        </div>
       
        <div class="flex flex-col w-full ">
            <div class=" bg-white p-3 ">
                <img class="rounded-full mx-auto -mt-16" width="200px" src="{{ $user->provider_avatar }}" alt="{{ $user->id }}">
                <div class="w-full border-t mt-3 text-center p-2">
                    <span class="font-medium text-sm text-gray-600 my-3"> 
                        {{ $user->provider_username }} <span class="bg-green-300 text-black p-1 rounded ml-3">{{ $user->user_type }}</span>
                    </span>
                    <br>
                    <span class="font-medium text-sm text-gray-600 my-3"> 
                        {{ $user->provider_email }} 
                    </span>

                    <br>
                    <button onclick="location.href = '{{ route('logout') }}' " class="py-2 px-6 text-white hover:opacity-80 transition mt-3" style="background : var(--blue) ;">
                        <span>
                            Contact
                            
                            <i class="fa-brands fa-linkedin ml-2"></i>
                        </span>
                        
                        
                    </button>
                </div>
            </div>
            
        </div>
        
        
    </div>
@endsection

