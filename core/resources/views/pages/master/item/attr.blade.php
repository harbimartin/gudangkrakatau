@extends('index', ['on'=>'item'])
@section('content')
    <?php
        $column_update = json_encode([
            'name' => [ 'name'=>'Nama', 'type'=>"String" ],
            'group_id' => [ 'name'=>'Jenis', 'type'=>"TextSel", 'api'=>'group', 'val'=>['name'], 'desc'=>['desc']],
            'classification_id' => [ 'name'=>'Klasifikasi', 'type'=>"TextSel", 'api'=>'classification', 'val'=>['name'], 'desc'=>['desc']],
            'upc'=>[ 'name'=>"Code", 'type'=>"String"],
            'desc' => [ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true ],
        ]);
        $column_add = [
            // 'option' => [ 'name'=>'Metode', 'type'=>"Radio", 'option'=>[ 0 => "", 1 => ""], 'desc'=>['desc']],
            'm_attr_id' => [ 'name'=>'Attribute', 'type'=>"TextSel", 'api'=>'attribute', 'mandatory'=>'sku_count', 'val'=>['name'], 'desc'=>['desc'], 'full'=>true],
            'value' => [ 'name'=>'Nilai', 'type'=>"String" ],
            'm_uom_id' => [ 'name'=>'Satuan', 'type'=>"TextSel", 'api'=>'uom', 'val'=>['desc'], 'desc'=>['code']],
        ];
        if ($error && isset($error['data']['need_code']))
            $column_add['code'] = [ 'name'=>'Code', 'type'=>"String", 'api'=>'values', 'val'=>['name'], 'desc'=>['desc']];
        $column_add = json_encode($column_add);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index", 'shrink'=>true, 'align'=>'center'],
            'attribute'=>[ 'name'=>"Atribute", 'type'=>"SString", 'child'=>'name', 'shrink'=>true],
            'value'=>[ 'name'=>"Nilai", 'type'=>"SString", 'child'=>'value', 'align'=>'right'],
            'uom'=>[ 'name'=>"Unit of Measure", 'type'=>"SString", 'child'=>['code', 'name']],
            'value_'=>['by'=>'value', 'name'=>"Code", 'type'=>"SString", 'child'=>'code', 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Delete', 'shrink'=>true, 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-update
        :column="$column_update"
        unique="update"
        title="Update Barang"
        :data="$header"
        :select="$select"
        :error="$herror"
    >
    </x-update>
    <x-add
        :column="$column_add"
        unique="add"
        title="Form Add Nilai Atribute"
        button="Add Nilai Atribute"
        :select="$select"
        :error="$error"
    >
    </x-add>
    <x-table
        :datef="true"
        :column="$column_table"
        title="Atribut {{$header->name}}"
        :datas="$data"
        :prop="$table"
        :lim="false"
        :datef="false"
        :search="false"
    >
        {{-- <div class="flex">
            <div class="my-auto">
                Tambah Attribute
            </div>
            <div class="col-end-7 col-start-1 md:col-start-2 relative block">
                <input
                    type="text"
                    value=""
                    list="datalist_attribute"
                    placeholder="Pilih Atribut Item"
                    class="hide-ico w-full h-full rounded border px-2 py-1 focus:shadow-inner focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent transition"
                >
                <div class="pointer-events-none absolute top-0 right-2 h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-full" width="16" height="16" viewBox="0 0 16 16">
                            <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </div>
            </div>
            <input id="attribute" name="attribute" hidden>
        </div>
        <datalist id="datalist_attribute">
            @foreach ($select['attribute'] as $item)
                <option
                    data-value="{{$item['id']}}"
                    value="{{$item['name']}}"
                    >{{$item['desc']}}
                </option>
            @endforeach
        </datalist> --}}
    </x-table>
@endsection
