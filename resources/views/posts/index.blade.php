@extends('layouts')

@section('content')
    <div class="flex flex-col  max-w-md mx-auto">
        <h1 class="text-center font-bold text-2xl my-2">Quản lý bài viết</h1>
        <a href="{{ route('posts.create') }}" class="bg-teal-400 w-fit px-2 py-1 rounded-md">+ Thêm mới</a>
        <ul>
            @foreach ($posts as $post)
                <li class="flex flex-row w-full">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <div>
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="ml-10 text-blue-500 hover:cursor-pointer">Sửa</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:cursor-pointer">Xóa</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
