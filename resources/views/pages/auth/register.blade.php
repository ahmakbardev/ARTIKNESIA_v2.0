@extends('layouts.layout')
@section('content')
    <div class="w-1/2 mx-auto">
        <h1 class="text-3xl font-semibold text-primary mb-3">Register</h1>
        <div class="rounded-lg border border-gray-100 p-10 shadow-lgF">
            <form action="{{ route('register') }}" method="post" class="flex flex-col gap-y-5" autocomplete="off">
                @csrf
                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="name">Nama Lengkap</label>
                    <input type="text" class="border border-gray-300 rounded-lg py-1.5 px-4" id="name"
                        name="name" />
                </div>
                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="username">Username</label>
                    <input type="text" class="border border-gray-300 rounded-lg py-1.5 px-4" id="username"
                        name="username" />
                </div>
                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="emailF">Email</label>
                    <input type="text" class="border border-gray-300 rounded-lg py-1.5 px-4" id="email"
                        name="email" />
                </div>
                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="password">Password</label>
                    <input type="password" class="border border-gray-300 rounded-lg py-1.5 px-4" id="password"
                        name="password" />
                </div>
                <div class="flex flex-col gap-3">
                    <button type="submit" class="bg-primary text-white py-2 rounded-lg">Submit</button>
                    <a href="{{ route('oauth.google') }}"
                        class="bg-white border border-black text-center text-black py-2 rounded-lg flex items-center justify-center gap-x-3"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/24px-Google_%22G%22_logo.svg.png"
                            alt="google"><span>Login with google</span></a>
                </div>
            </form>
        </div>
    </div>
@endsection
