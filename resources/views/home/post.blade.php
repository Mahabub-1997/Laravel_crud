@extends('home.master')

@section('content')

    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-yellow-600 text-xl">Create</h2>
            <a href="{{route('home')}}" class="text-white bg-green-600 px-4 py-2 rounded">Back to Home</a>
        </div>
        <div>
            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-5">
                    <label >Title</label>
                    <input type="text" placeholder="Title.." name="title" value="{{old('title')}}" >

                    @error('title')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror

                    <label >Name</label>
                    <input type="text" placeholder="Name.." name="name" value="{{old('name')}}" >
                    @error('name')
                    <div class="text-red-600">{{ $message }}</div>
                    @enderror

                    <label >Description</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg
                    border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                    dark:focus:border-blue-500" name="description" placeholder="Write your thoughts here..."></textarea>
                    <input type="file" name="image[]" accept="image/*" MULTIPLE >

                    <div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                            Button
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>

@endsection

