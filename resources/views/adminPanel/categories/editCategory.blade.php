@section('title', 'Edit : ' . $category->name)
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Category : {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- create category form  -->
                    <div>
                        <form method="post" action="{{ route('admin.categories.update', $category) }}" class=" space-y-6">
                            <div>
                                <x-input-label for="name" value="Name" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                 value="{{ $category->name }}"  />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <x-primary-button>Update</x-primary-button>
                            @csrf
                            @method('PUT')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>