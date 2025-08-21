@extends('layouts')

@section('content')
    <div>
        <h1 class="text-center font-bold text-2xl my-2">Đăng ký</h1>

        <form action="{{ route('auth.showSignup') }}" method="POST" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <label for="name">Tên người dùng</label>
                <input name="name" type="name" id="name" class="bg-gray-100 w-full p-2.5 "
                    placeholder="Tên người dùng" required />
            </div>
            <div class="mb-5">
                <label for="email">Email</label>
                <input name="email" type="email" id="email" class="bg-gray-100 w-full p-2.5 "
                    placeholder="beready@technology.com" required />
            </div>
            <div class="mb-5">
                <label for="password">Mật khẩu</label>
                <input name="password" type="password" id="password" class="bg-gray-100 w-full p-2.5 " placeholder="******"
                    required />
            </div>

            @if ($errors->any())
                <div class="mb-5 bg-red-100 text-red-500 px-2 py-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="text-white bg-blue-700 font-semibold w-full px-5 py-2.5 text-center">Đăng
                ký</button>
            <div class="w-full rignt-0 text-right">Đã có tài khoản?<a href="{{ route('auth.showSignin') }}"
                    class="text-blue-600 font-semibold  ml-2">Đăng
                    nhập</a>
            </div>
        </form>
    </div>
@endsection
