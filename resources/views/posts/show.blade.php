@extends('layouts')

@section('content')
    <div class="flex flex-col  max-w-md mx-auto">
        <h1 class="text-center font-bold text-2xl my-2">{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
    </div>
@endsection
