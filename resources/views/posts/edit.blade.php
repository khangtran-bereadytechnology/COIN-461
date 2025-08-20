@extends('layouts')

@section('content')
    <div>
        <h1 class="text-center font-bold text-2xl my-2">Sửa bài viết</h1>


        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="max-w-sm mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="title">Tiêu đề bài viết</label>
                <input name="title" type="title" id="title" value="{{ $post->title }}" class="bg-gray-100 w-full p-2.5"
                    placeholder="Bài viết" required />
            </div>
            <div class="mb-5">
                <label for="content">Nội dung</label>

                <textarea name="content" id="content" class="bg-gray-100 w-full p-2" required cols="20" rows="8">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="text-white bg-blue-700 font-semibold w-full px-5 py-2.5 text-center">Cập
                nhật</button>
        </form>

    </div>
@endsection
