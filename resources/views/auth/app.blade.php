<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Link the sink - @yield('title')</title>
    <style>
        #auth{
            background-image: url('https://images.unsplash.com/photo-1483354483454-4cd359948304?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fGxvZ2lufGVufDB8fDB8fHww&auto=format&fit=crop&w=700&q=60') ; 
            background-size: cover; 
            background-repeat: no-repeat ; 
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="auth" class="w-full flex justify-center items-center" style="height : 100vh;">
        <div class="border bg-white w-2/3 border-gray-300 shadow-md p-3 md:w-1/2 lg:w-1/3">
            <h3 class="font-medium text-2xl text-center my-3">
                
                @yield('title') now
            </h3>
            <p id="backup-auth" class="text-sm md:text-md font-medium text-red-500 my-4 ">
                {{-- backup message from server --}}
            </p>
            <div class="my-3">
                @yield('content')
            </div>
           @yield('button')
            <div class="border-b border-gray-300 my-4"></div>
            <div class="my-2">
                <button id="google" class="border flex px-7 justify-center items-center h-10 w-full transition hover:text-blue-600">
                    <a href="{{ route('google') }}">
                        <i class="fa-brands fa-google mr-3"></i>
                        <span class="text-sm font-medium">Continue with Google account</span>
                    </a>
                </button>
            </div>
            <div class="my-2">
                <button id="github" class="border flex px-7 justify-center items-center h-10 w-full transition hover:text-blue-600">
                    <a href="{{ route('github') }}">
                        <i class="fa-brands fa-github mr-3"></i>
                        <span class="text-sm font-medium">Continue with Github account</span>
                    </a>
                </button>
            </div>
            <div class="border-b border-gray-300 my-4"></div>
            <div class="w-full flex justify-between px-3">
                
                @yield('where')
                
                
            </div>
        </div>
    </div>
    <script src="{{ url('js/validation.js') }}"></script>
    <script src="{{ url('js/authAPI.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>