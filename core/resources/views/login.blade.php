<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title>Gudang Krakatau</title>
</head>
<body>
    <section class="logins">
        <div class="flex flex-column justify-center items-center h-screen">
        @if($error)
            <div class="col-span-2">
                <div class="rounded-md bg-red-100 text-red-800 md:flex p-3">
                    <div class="inline-flex mb-auto">
                        <svg class="my-auto h-3 w-3 md:h-4 md:w-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="ml-1 md:ml-2" style="min-width:110px;">Error Message : </div>
                    </div>
                    <div class="md:ml-2">{{$error['msg']}}</div>
                </div>
            </div>
        @endif
            <div class="p-4 rounded-md shadow-xl border md:w-2/6 w-full md:mx-0 mx-2">
                <h2 class="font-bold text-center text-lg">Login Gudang Krakatau</h2>
                <form class="w-full mt-10" action="{{url('login')}}" method="POST">
                    @csrf
                    <input hidden name="_last_" value="{{request()->_last_ ? request()->_last_ : request()->fullUrl()}}">
                    <div class="form-group">
                        <label class="block text-gray-700 text-sm font-sans font-semibold mb-2" for="nik">Username</label>
                        <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded pb-2 pt-1 px-2 text-gray-700 leading-tight focus:outline-none text-sm w-full focus:bg-white focus:border-blue-400 form-control" id="username" type="text" name="username" placeholder="Masukan Username...">
                    </div>
                    <div class="mt-4 form-group">
                        <label class="block text-gray-700 text-sm font-sans font-semibold mb-2" for="password">Password</label>
                        <input class="bg-gray-100 appearance-none border-2 border-gray-200 rounded pb-2 pt-1 px-2 text-gray-700 leading-tight focus:outline-none text-sm w-full focus:bg-white focus:border-blue-500 form-control" id="password" name="password" type="password" placeholder="Masukan Password...">
                    </div>
                    <button type="submit" class="bg-blue-500 rounded-md text-white font-semibold text-md w-full py-1 mt-5">Masuk</button>
                </form>
            </div>
        </div>
        {{-- @if($message = Session::get('failure'))
        <div class="container mx-auto transition duration-500 ease-in-out fixed top-3 z-10 right-2">
            <div class="max-w-sm flex justify-start ml-auto px-5 bg-red-100 py-2 text-red-500 rounded-md font-semibold text-sm" role="alert">
                <p>{{$message}}</p>
                <i class="fa fa-times text-xs cursor-pointer ml-auto my-auto"></i>
            </div>
        </div>
        @endif --}}
    </section>
</body>
</html>
