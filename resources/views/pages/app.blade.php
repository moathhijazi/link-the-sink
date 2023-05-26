<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Link The Sink - @yield('where')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            display: grid ; 
            grid-template-columns: repeat(12 , 1fr) ; 
            grid-template-rows: 60px auto ; 
            grid-template-areas: "h h h h h h h h h h h h" 
                                 "b b b b b b b b b b b b";
            gap: 10px; 
        }
        :root {
          --blue : #2386c8 ; 
        }
        #h-btn {
          padding: 0 20px ;
          display: flex ; 
          justify-content: center ; 
          align-items: center ; 
          height: 100%; 
          transition: .3s ease ; 
        }
        #d-btn {
          padding: 10px 20px ;
          display: flex ; 
          justify-content: space-between ; 
          align-items: center ; 
          height: 100%; 
          transition: .3s ease ; 
        }
        #h-btn:hover{
          background: #4fa5df ; 
          
          transition: .3s ease ; 

        }
        #d-btn:hover{
          background: #4fa5df ; 
          
          transition: .3s ease ; 

        }
    </style>
    </head>
  <body class="bg-gray-100">
    <div style="grid-area: h ; background : var(--blue) ;padding : 0 ;" class="flex justify-center">
      <div class="container flex justify-between items-center h-full p-0">
          <div class="flex items-center p-0 h-full">
            <button id="h-btn" onclick="toggleDropdown()">
              <span>
                <i class="fa-solid fa-bars text-2xl text-white"></i>
              </span>
            </button>
            <a href="/posts" id="h-btn">
              <h2 class="text-2xl text-white"><i>Link-The-Sink</i> </h2>
            </a>
            <div class="xl:flex items-center h-full p-0 hidden ">
              <a href="/new" id="h-btn" class="text-white text-md">
                <i class="fa-solid fa-plus mr-3"></i>
                <span>Add new job</span>
              </a>
              <a href="/own" id="h-btn" class="text-white text-md">
                <i class="fa-solid fa-folder-open mr-3"></i>
                <span>My posts</span>
              </a>
              <a href="/jobseekers" id="h-btn" class="text-white text-md">
                <i class="fa-solid fa-user-group mr-3"></i>
                <span>Jobseekers</span>
              </a>
              <a href="/posts" id="h-btn" class="text-white text-md">
                <i class="fa-solid fa-cubes mr-3"></i>
                <span>Brows the posts</span>
              </a>
            </div>
          </div>
          <div class="flex items-center p-0 h-full">
            
            <a href="/notifications" id="h-btn" class="text-white text-md">

              <i class="fa-solid fa-bell text-xl"></i>              
            </a>
            <a href="/" id="h-btn" class="text-white text-md">

              <img class="h-2/3 rounded-full" src="{{ url(@$_SESSION['user']['avatar']) }}" alt="{{ @$_SESSION['user']['username'] }}">
              
            </a>
          </div>
      </div>
    </div>


   

    <section style="grid-area : b ;" class="px-8" >
      <div id="dropdown"  class="hidden md:w-1/2 border w-full p-2 flex flex-col shadow-2xl" style="background : var(--blue)">
        <a href="/new" id="d-btn" class="text-white text-md">
          <i class="fa-solid fa-plus mr-3"></i>
          <span>Add new job</span>
        </a>
        <a href="/own" id="d-btn" class="text-white text-md">
          <i class="fa-solid fa-folder-open mr-3"></i>
          <span>My posts</span>
        </a>
        <a href="/jobseekers" id="d-btn" class="text-white text-md">
          <i class="fa-solid fa-user-group mr-3"></i>
          <span>Jobseekers</span>
        </a>
        <a href="/posts" id="d-btn" class="text-white text-md">
          <i class="fa-solid fa-cubes mr-3"></i>
          <span>Brows the posts</span>
        </a>
      </div>
       <main class="pt-6">
        <div class="w-1/2 mb-6">
          <span class="font-medium text-gray-500">@yield('title')</span>
          <h1 class="text-2xl mt-4">@yield('where')</h1>
        </div>
          @yield('content')
       </main>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ url('js/event.js') }}"></script>
    <script src="{{ url('js/firstAPI.js') }}"></script>
    <script src="{{ url('js/secondAPI.js') }}"></script>
  </body>
</html>





