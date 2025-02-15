@section('title', 'Edit Post : ' . $post->title)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- create category form  -->
                    <div>
                        <form method="post" action="{{ route('admin.posts.update',$post) }}" class=" space-y-6">

                            <!-- title  -->
                            <div>
                                <x-input-label for="title" value="Title" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                                    autofocus autocomplete="title" value="{{ $post->title }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            <div>
                                <x-input-label for="body" value="Description" />

                                <textarea id="body" name="body" rows="4"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    placeholder="Write your thoughts here..." required autofocus
                                    autocomplete="body">{{ $post->body }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('body')" />
                            </div>

                            <!-- category  -->
                            <div>
                                <x-input-label for="category" />
                                <select id="category" name="category_id"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required autofocus
                                    autocomplete="categories">
                                    @foreach ( $categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $post->category?->id)== $category->id)>{{ $category->name }}</option>              
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                            </div>
                            <x-primary-button>Update?</x-primary-button>
                            @csrf
                            @method('PUT')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>