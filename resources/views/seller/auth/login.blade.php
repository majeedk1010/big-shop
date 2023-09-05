<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-[#B7F397] to-[#FFB4AB] min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0 font-serif">
    <header class="max-w-lg mx-auto">
        <a href="#">
            <h1 class="text-4xl font-bold text-slate-800 text-center">Seller Login</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl">Welcome to Big Shop Seller</h3>
            <p class="text-gray-600 pt-2">Sign in to your account.</p>
            @if (Session::has('error'))
                <span class="text-red-600 text-sm">{{ Session::get('error') }}</span>
            @endif
        </section>

        <section class="mt-10">
            <form class="flex flex-col" method="POST" action="{{route(getenv('SELLER_BASE_NAME').'.login')}}">
                @csrf
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="text" id="email" name="email"  value="{{ old('email') }}" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-[#FFB4AB] transition duration-500 px-3 pb-3">
                    @error('email')
                       <span class="px-4 text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}"  class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-[#FFB4AB] transition duration-500 px-3 pb-3">
                    @error('password')
                        <span class="px-4 text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <a href="#" class="text-sm text-[#FFB4AB] hover:text-[rgb(204,118,109)] hover:underline mb-6">Forgot your password?</a>
                </div>
                <button class="bg-gradient-to-r from-[#B7F397] to-[#FFB4AB] hover:from-[#FFB4AB] hover:to-[#B7F397] hover:text-slate-900 text-slate-600 font-bold py-2 rounded shadow-lg hover:shadow-xl transition-all duration-300" type="submit">Sign In</button>
            </form>
        </section>
    </main>

    <div class="max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white">Don't have an account? <a href="#" class="font-bold hover:underline">Sign up</a>.</p>
    </div>

    <footer class="max-w-lg mx-auto flex justify-center text-white">
        <a href="#" class="hover:underline">Terms & conditions</a>
        <span class="mx-3">•</span>
        <a href="#" class="hover:underline">Privacy Policy</a>
    </footer>
</body>
</html>
