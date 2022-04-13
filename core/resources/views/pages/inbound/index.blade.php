@extends('index', ['on'=>'inbound'])
@section('content')
    {{-- <form class="container md:rounded-lg shadow my-3 md:my-8 py-2 md:py-4 px-3 md:px-6 bg-white text-xs md:text-base" action="{{request()->fullUrl()}}" method="POST" enctype="multipart/form-data"> --}}
        <?php
        $column = json_encode([
            'gudang_id'=>[ 'name'=>"Gudang", 'type'=>'String', 'full'=>false, 'def'=>'Gudang JKT'],
            'code'=>[ 'name'=>"Kode", 'type'=>'String', 'full'=>false, 'def'=>'JKT009121'],
            'm_transport_id'=>[ 'name'=>"Kendaraan", 'type'=>'String', 'full'=>false, 'def'=>'Truck'],
            'receive_by'=>[ 'name'=>"Diterima Oleh", 'type'=>'String', 'full'=>false, 'def'=>'Alex Refandi'],
            'note'=>[ 'name'=>"Catatan", 'type'=>'String', 'def'=>'Barang tiba dengan aman'],
            'supir'=>[ 'name'=>"Supir", 'type'=>'String', 'def'=>'Jordi'],
            'm_asal_id'=>[ 'name'=>"Asal Barang", 'type'=>'String', 'def'=>'Cilegon'],
            'receive_at'=>[ 'name'=>"Diterima", 'type'=>'Date', 'def'=>'0'],
            // 'created_at'=>[ 'name'=>"Created", 'type'=>'Date', 'def'=>'0'],
            // 'updated_at'=>[ 'name'=>"Update", 'type'=>'Date', 'def'=>'1']
        ]);
        // foreach(json_decode($data['body']) as $object){
        //     $arrays[] =  (array) $object;
        // }
    ?>
        {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-4 md:p-5">
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
        </div> --}}
    {{-- </form> --}}
    @isset(request()->id)
        <x-update
            unique="email"
            title="Header Pemasukan"
            :column="$column"
            :data="$header"
            :detail="true"
            button="Tambah Pemasukan Header"
        >
        </x-update>
        @yield('detail')
    @else
    <x-add
        unique="email"
        title="Form Header Pemasukan"
        :column="$column"
        {{-- :data="$data" --}}
        :detail="true"
        button="Tambah Pemasukan Header"
    >
    </x-add>
    @endisset
@endsection
