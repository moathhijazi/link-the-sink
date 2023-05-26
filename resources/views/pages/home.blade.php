@extends('pages.app')
@section('title' , 'Home')
@section('where' , 'Dashboard')
    

@section('content')
    <div class="flex flex-col-reverse mb-14">
        <div class="w-full bg-white p-3 mr-2">

            @if ($_SESSION['account'] == 'verified')
                
                <h2 class="font-light text-2xl mb-3">Complete your profile</h2>
                <div id="complete-backup" class=" text-red-500 font-medium text-sm">
                   {{-- complete backup --}}
                </div>
                <div class="my-2 flex flex-col">
                    <label for="type" class="">Account Type</label>
                    <select onchange="check_type()" id="type" class="w-full border border-gray-300 h-12 focus:outline-none px-3 mt-2">
                        <option value="guest" selected>Select account type</option>
                        <option value="jobseeker" >Jobseeker</option>
                        <option value="employer" >Employer</option>
                    </select>
               
                </div>
                <div class="my-2 flex flex-col">
                    <label for="type" class="">Experience Bio</label>
                    <textarea id="bio" cols="30" rows="10" class="w-full border border-gray-300 h-18 focus:outline-none px-3 mt-2"></textarea>

                </div>
                <div id="pushed"></div>
                <div class="my-2 flex  justify-between">
                    
                    <button onclick="validate_complete()" class="py-2 px-6 text-white hover:opacity-80 transition" style="background : var(--blue) ;">
                        <span>
                            Next
                            
                            <i class="fa-solid fa-arrow-right ml-2"></i>
                        </span>
                        
                        
                    </button>

                </div>


            @else
                <h2 class="font-light text-2xl mb-3">Hi , {{$_SESSION['user']['username']}}</h2>
                <div class="flex justify-between items-center w-full">
                    <input type="text" class="w-2/3 border h-12 px-3 mx-1" value="{{ $_SESSION['user']['id'] }}" disabled>
                    <input type="text" class="w-2/3 border h-12 px-3 mx-1" value="{{ $_SESSION['user']['username'] }}" disabled>
                </div>
                <div class=" w-full mt-3">
               
                    <input type="text" class="w-full border h-12 px-3 mx-1" value="{{ $_SESSION['user']['email'] }}" disabled>
                </div>
                <div class=" w-full mt-3">
                    <label for="" class="pl-2 font-medium">Account type</label>
                    <input type="text" class="w-full border h-12 px-3 mx-1 mt-2" value="{{ $_SESSION['account'] }}" disabled>
                </div>
                <div class="w-full bg-white p-3 mr-2 mt-4">
                <div class="w-full bg-white p-3 mr-2 mt-5 border-b border-gray-300">
    
                    <div class="w-full flex justify-between">
                        <p class="font-medium text-gray-600">
                            Skills
                        </p>
                        <div class="flex items-center space-x-2">
                            <input type="text" id="skills-input" class="h-12 border focus:outline-none border-gray-300 bg-gray-100 px-3 uppercase placeholder:capitalize" placeholder="Add new skills" style="width : 180px;">
                            <button onclick="addSkill()" class="py-2 px-6 text-white cursor-default h-12 transition hover:opacity-80 cursor-pointer " style="background : var(--blue) ;">
                                <span>
                                    Add
                                    
                                    <i class="fa-solid fa-arrow-right ml-2"></i>
                                </span>
                                
                                
                            </button>
                        </div>
                    </div>
                
                    
        
                </div>
                {{-- skills --}}
                    <div id="skills" class="w-full flex justify-start space-x-2">
                        
                        @foreach ($skills as $skill)
                            <button  class="py-2 px-6 text-white cursor-default transition mt-3" style="background : var(--blue) ;">
                                <span>
                                    {{ $skill->skill }}
                                    
                                    <i class="fa-solid fa-tag ml-2"></i>
                                </span>
                                
                                
                            </button>
                        @endforeach
                       
                    </div>
                
                    
        
                </div>
                
            @endif

        </div>
        <div class="flex flex-col w-full ">
            
            <div class=" bg-white p-3 ">
            
                    <form method="POST" action="{{ route('image_change') }}" id="form-change" class="flex justify-center items-center -mt-16" enctype="multipart/form-data">
                        @csrf
                        <img id="image" style="height : 200px; " class="rounded-full mx-auto " width="200px" src="{{ $_SESSION['user']['avatar'] }}" alt="{{ $_SESSION['user']['username'] }}">
                        <div  id="image-changer" class="hidden bg-black rounded-full absolute opacity-50 flex justify-center items-center cursor-pointer" style="width : 200px; height : 200px;">
                            <label for="fileInput" class="relative cursor-pointer bg-white text-black font-bold py-2 px-4 rounded">
                                <span class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"></span>
                                Change image
                              </label>
                              <input id="fileInput" name="img" type="file" accept="image/*"  class="hidden">
                              
                        </div>
                    </form>
                    
              
                <div class="w-full border-t mt-3 text-center p-2">
                    <span class="font-medium text-sm text-gray-600 my-3"> 
                        {{ $_SESSION['user']['username'] }}
                    </span>
                    @if ($_SESSION['account'] != 'verified')
                    <div class="w-full justify-center space-x-3">
                        <span>{{ $get('bio') }}</span>
                    </div>
                    @if ($_SESSION['account'] != 'employer')
                    <div class="w-full justify-center space-x-3 mt-3">
                        
                        <a class="text-blue-500 space-x-3" href="{{ $get('linkedin_link') }}">LinkedIn <i class="fa-brands fa-linkedin"></i></a>
                        <a class="text-blue-500 space-x-3" href="{{ $get('github_link') }}">Github <i class="fa-brands fa-github"></i></a>
                    </div>
                    @endif
                    
                    @endif
                    @if ($admin)
                    <button onclick="location.href = '{{ route('admin') }}' " class="py-2 px-6 text-white hover:opacity-80 transition mt-3 bg-black">
                        <span>
                            Admin panel
                            
                            <i class="fa-solid fa-user-shield"></i>
                        </span>
                        
                        
                    </button>
                    @endif
                    <br>
                    <button onclick="location.href = '{{ route('logout') }}' " class="py-2 px-6 text-white hover:opacity-80 transition mt-3" style="background : var(--blue) ;">
                        <span>
                            Log out
                            
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </span>
                        
                        
                    </button>
                    
                    
                </div>
                
            </div>
            @if ($_SESSION['account'] == 'verified')
            <div class=" bg-white p-3 mt-4" style="height : 40%; ">
                

                   
                <h2 class="mb-2 text-lg font-semibold text-gray-900 ">Account status:</h2>
                <ul class="max-w-md space-y-2 text-gray-500 list-inside dark:text-gray-400">
                    <li class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Create an account
                    </li>
                    <li class="flex items-center">
                        <svg aria-hidden="true" class="w-5 h-5 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        Login to your account
                    </li>
                    <li class="flex items-center">
                        <div role="status">
                            <svg aria-hidden="true" class="w-5 h-5 mr-2 text-gray-200 animate-spin dark:text-gray-100 fill-black" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        Complete registeration
                    </li>
                </ul>
            
                    
                
            </div>
            @endif
        </div>
        
        
    </div>
@endsection

