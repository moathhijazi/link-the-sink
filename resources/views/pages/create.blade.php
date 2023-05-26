@extends('pages.app')
@section('title' , 'Home \ new post')
@section('where' , 'New Job post')

@section('content')
    @if ( session('success') != null )

        <div class="fixed top-13 right-0 p-4 bg-green-500 opacity-80 w-1/3 h-14">
            <span class="text-white">{{ session('success') }}</span>
        </div>
        
    @endif
    
    <form method="POST" action="{{ route('submit_post') }}"  class="w-full p-6 bg-white mb-12" enctype="multipart/form-data">
        @csrf
        <div class="my-3">
            <label for="title" class="text-lg text-gray-600">Enter job title</label>
            <input type="text" name="title" id="title" class="w-full border h-12 focus:outline-none px-3 my-3">
        </div>
        <div class="my-3">
            <label for="des" class="text-lg text-gray-600">Enter job description</label>
            <textarea type="text" name="des" id="des" class="w-full border h-20 focus:outline-none px-3 my-3"></textarea>
        </div>
        <div class="my-3">
            <label for="link" class="text-lg text-gray-600">Enter job link (optional)</label>
            <input type="text" name="link" id="link" class="w-full border h-12 focus:outline-none px-3 my-3" placeholder="https://example.com">
        </div>
        <div class="my-3">
           
            <button type="submit" class="py-2 px-6 text-white hover:opacity-80 transition mt-3" style="background : var(--blue) ;">
                <span class="font-medium">
                    
                    Send
                    
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
                
                
            </button>
            
        </div>
    </form>
@endsection