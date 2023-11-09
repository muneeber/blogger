@extends('article.layouts.app')

@section('content')
    <div class="w-full mx-auto mt-5 mb-10">
       <span class="block inline text-md text-white transition-all hover:text-gray-100 font-bold uppercase">
           <a href="{{ route('crt') }}" class="bg-red-700 rounded-md py-3 px-5">
                Create Article
           </a>
      </span>
    </div>
    @forelse ($data as $blog)
        
   
    <div class="space-y-2 xl:items-baseline xl:space-y-0 w-4/5 pt-20 sm:w-3/5 mx-auto">
        <div class="border-b-2 border-neutral-700 pb-10 pt-10">
            <span class="sm:float-right float-left text-gray-400">
                {{ $blog->created_at->format('d-M-y') }}, {{ $blog->user->name }}
            </span>

            <a href="{{ route('article.show',$blog->id) }}">
                <h2 class="hover:text-red-700 sm:w-3/5 transition-all text-white sm:pt-0 pt-10 text-3xl sm:text-4xl font-bold sm:pb-2 w-full block">
                    {{ $blog->title }}
                </h2>
            </a>

            <p class="text-gray-400 leading-8 py-6 text-lg w-full sm:w-3/5">
                {{ $blog->excerpt }}
            </p>

            <span class="block inline text-xs text-white transition-all hover:text-gray-100 font-bold pr-2 uppercase">
            <a href="/" class="bg-red-700 rounded-md py-1 px-3">
                {{ $blog->category_id }}
            </a>
            </span>
        </div>
    </div>
    @empty
    <h2 class="hover:text-red-700 sm:w-3/5 transition-all text-white sm:pt-0 pt-10 text-3xl sm:text-4xl font-bold sm:pb-2 w-full block">
        Unfortunately can't find any thing!
    </h2>
    @endforelse
@endsection