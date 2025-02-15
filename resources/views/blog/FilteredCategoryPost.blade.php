@extends('layouts.blog')

@section('title', 'Welcome To Our Blog')

@section('main-content')


    <section>
        <!-- back button  -->
        <div class="max-w-7xl  mx-auto px-[32px]">
            <a class="inline-flex items-center justify-center gap-2 px-3 py-1 mb-6 text-lg font-medium transition rounded-full ring-1 ring-inset text-zinc-400 ring-white/10 hover:bg-white/5 hover:text-white"
                href={{route('index')}}>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd"
                        d="M7.793 2.232a.75.75 0 0 1-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 0 1 0 10.75H10.75a.75.75 0 0 1 0-1.5h2.875a3.875 3.875 0 0 0 0-7.75H3.622l4.146 3.957a.75.75 0 0 1-1.036 1.085l-5.5-5.25a.75.75 0 0 1 0-1.085l5.5-5.25a.75.75 0 0 1 1.06.025Z"
                        clip-rule="evenodd" />
                </svg>

                Back
            </a>
        </div>
        <!-- Main Contents -->
        <section class="flex flex-col gap-8 px-4 pt-5 pb-20 mx-auto xl:gap-24  max-w-7xl sm:px-6 lg:px-8">
            <!-- Posts -->
            <section class="flex flex-col gap-8 ">
                @forelse($posts as $post)
                    <article
                        class="w-full rounded-xl p-6 text-white shadow-lg bg-zinc-900/20 ring-1 backdrop-blur-[2px] ring-white/15 space-y-6">
                        <div class="flex flex-row items-center justify-between">
                            <!-- Category Pill -->
                            <div>
                                <a class="inline-flex gap-0.5 justify-center overflow-hidden text-sm sm:text-base font-medium transition rounded-full py-1 px-3 bg-emerald-400/10 text-emerald-400 ring-1 ring-inset ring-emerald-400/20 hover:bg-emerald-400/10 hover:text-emerald-300 hover:ring-emerald-300"
                                    href="{{route('index', ['category' => $post->category->slug])}}">{{$post->category->name}}</a>
                            </div>

                            <!-- Date -->
                            <p class="text-sm font-semibold sm:text-base text-zinc-400">
                                {{$post->created_at->diffForHumans()}}
                            </p>
                        </div>

                        <!-- Main Content -->
                        <div>
                            <!-- Article Title -->
                            <a href="{{ Route('blog.post', $post->slug) }}">
                                <h3 class="mb-4 text-xl font-bold md:text-4xl hover:underline decoration-emerald-700">
                                    {{ $post->title }}
                                </h3>
                            </a>

                            <!-- excerpt -->
                            <p class="text-base font-medium text-zinc-400 md:text-lg ">
                                {{str($post->body)->limit(200)}}
                            </p>
                        </div>

                        <!-- Card Bottom -->
                        <div class="flex flex-row items-center justify-between">
                            <!-- Author Info -->
                            <div class="flex items-center gap-2">
                                <img class="w-8 h-8 p-0.5 rounded-full ring-1 ring-emerald-500"
                                    src="https://avatars.githubusercontent.com/u/145395670?v=4" alt="{{$post->user->name}}" />
                                <h4>{{$post->user->name}}</h4>
                            </div>

                            <!-- Read More Link -->
                            <a class="inline-flex gap-0.5 justify-center overflow-hidden text-base font-medium transition text-emerald-400 hover:text-emerald-500"
                                href="{{Route('blog.post', $post->slug)}}">
                                Read more
                                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"
                                    class="mt-0.5 h-5 w-5 relative top-px -mr-1">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        d="m11.5 6.5 3 3.5m0 0-3 3.5m3-3.5h-9"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <h3 class="mb-4 text-xl font-bold md:text-4xl text-white">
                        No Posts Available
                    </h3>
                @endforelse
                {{ $posts->links() }}

            </section>

        </section>
    </section>

@endsection