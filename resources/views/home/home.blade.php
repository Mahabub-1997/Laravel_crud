@extends('home.master')

@section('content')

    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-600 text-xl">Home</h2>
            <a href="{{route('create')}}" class="text-white bg-green-600 px-4 py-2 rounded">Add New Post</a>
        </div>
    </div>
    <div class="flex flex-col gap-5">
    @if(session('success'))
        <h2 class="text-green-600 py-5 mx-auto text-2xl" >{{session('success')}}</h2>
    @endif

        <div class="gap-5 px-10 py-4">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>

                    @foreach($posts as $key=>$post)
                    <tbody>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            {{++$key}}
                        </th>
                        <td class="px-6 py-4">{{$post->title}}</td>
                        <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">{{$post->name}}</td>
                        <td class="px-6 py-4">{{$post->description}}</td>

{{--                       @foreach($post as $item)--}}
                        <td class="px-6 py-4">
                            <img  src="{{asset($post->image)}}" width="50px" height="50px" >
                        </td>
{{--                        @endforeach--}}
                        <td class="px-6 py-4">{{ date('F d, Y', strtotime($post->created_at)) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{route('edit',[$post->id])}}" type="button" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg
                             text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Edit</a>

                            <a href="{{route('delete',[$post->id])}}" onclick="return confirm('are you sure want to deleted?')" type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600
                            hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300
                             dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection
