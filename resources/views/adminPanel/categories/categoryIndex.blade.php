@section('title', 'Browse All Categories')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Browse All Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- categories table  -->
                    <div>

                        <!-- alert  -->
                        <div class="mb-4">
                            <!-- @if (session('success'))
                                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                    role="alert">
                                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Success</span>
                                    <div>
                                        <span class="font-medium">{{session('success')}}</span> Change a few things up and try
                                        submitting again.
                                    </div>
                                </div>
                            @endif -->
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                        <!-- create category button  -->
                        <div class="mb-4 text-right">
                            <a href="{{route('admin.categories.create')}}"><x-primary-button>Create
                                    Category</x-primary-button></a>
                        </div>

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Slug
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Posts
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Created
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $category->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $category->slug }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $category->posts->count() }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $category->created_at->diffForHumans() }}
                                            </td>
                                            <td class="px-6 py-4 text-right flex justify-start items-center gap-2">
                                                <a href="{{route('admin.categories.edit', $category)}}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                                    <button
                                                        onclick="return confirm('Are you sure you want to delete this category?')"
                                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                No categories available
                                            </th>
                                            <td class="px-6 py-4">

                                            </td>
                                            <td class="px-6 py-4">

                                            </td>
                                            <td class="px-6 py-4">

                                            </td>
                                            <td class="px-6 py-4 text-right flex justify-center items-center gap-2">

                                            </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- pagination  -->
                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>