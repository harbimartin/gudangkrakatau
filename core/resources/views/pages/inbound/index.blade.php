@extends('index', ['on'=>'brand'])
@section('content')<div class="md:px-6">
    <form class="container md:rounded-lg shadow my-3 md:my-8 py-2 md:py-4 px-3 md:px-6 bg-white text-xs md:text-base" action="{{request()->fullUrl()}}" method="POST" enctype="multipart/form-data">
        akwodoiawkdoi
        <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-4 md:p-5">
            <div class="grid md:col-span-2 grid-cols-6">
                <label class="my-1 md:mb-0 col-span-6 md:col-span-1">Test</label>
                <div class="col-end-7 col-start-1 md:col-start-2 relative block p-0">
                    <input
                        class="w-full h-full rounded border px-2 py-1 focus:shadow-inner focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent transition"
                    />
                </div>
            </div>
            <div class="grid grid-cols-3">
                <label class="my-1 md:mb-0 col-span-6 md:col-span-1">Test</label>
                <div class="col-end-7 col-start-1 md:col-start-2 relative block p-0">
                    <input
                        class="w-full h-full rounded border px-2 py-1 focus:shadow-inner focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent transition"
                    />
                </div>
            </div>
            <div class="grid grid-cols-3">
                <label class="my-1 md:mb-0 col-span-6 md:col-span-1">Test</label>
                <div class="col-end-7 col-start-1 md:col-start-2 relative block p-0">
                    <input
                        class="w-full h-full rounded border px-2 py-1 focus:shadow-inner focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent transition"
                    />
                </div>
            </div>
        </div>
    </form>

@endsection
