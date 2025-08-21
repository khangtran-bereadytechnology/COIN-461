<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Trần Nguyên Khang</title>
</head>

<body class="flex flex-col">
    <div class="w-full h-[60px] bg-teal-100 flex items-center font-semibold text-teal-950">
        <div class="flex flex-row w-full max-w-[900px] justify-between mx-auto px-3">
            <div class="flex flex-row gap-3">
                <a href="/">Trang chủ</a>
                <a href="/posts">Bài viết</a>
            </div>
            <div>
                @auth
                    <span>{{ Auth::user()->name }}</span>,
                    <form action="{{ route('auth.signout') }}" method="POST" class="inline ml-2">
                        @csrf
                        <button type="submit" class="hover:cursor-pointer">Đăng xuất</button>
                    </form>
                @else
                    <a href="/auth/signin" class="ml-2">Đăng nhập</a>
                @endauth
            </div>
        </div>
    </div>
    <div>
        @yield('content')
    </div>


</body>

</html>
