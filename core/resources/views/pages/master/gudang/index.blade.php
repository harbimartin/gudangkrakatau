@extends('index', ['on'=>'whouse'])
@section('content')
    <?php
        $column_add = json_encode([
            'name' => [ 'name'=>'Nama', 'type'=>"String"],
            'type_id' => [ 'name'=>'Tipe', 'type'=>"TextSel", "api"=>"type", "val"=>["name"], "desc"=>["desc"]],
            'kota' => [ 'name'=>'Kota', 'type'=>"String" ],
            'm_cabang_id' => [ 'name'=>'Cabang', 'type'=>"TextSel", "api"=>"cabang", "val"=>["name"], "desc"=>["desc"]],
            'desc' => [ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true ],
            'longitude' => [ 'name'=>'Longitude', 'type'=>"Number" ],
            'latitude' => [ 'name'=>'Latitude', 'type'=>"Number" ],
            'panjang' => [ 'name'=>'Panjang', 'type'=>"Number" ],
            'lebar' => [ 'name'=>'Lebar', 'type'=>"Number" ],
            'tinggi' => [ 'name'=>'Tinggi', 'type'=>"Number" ],
            'kapasitas' => [ 'name'=>'Kapasitas', 'type'=>"Number" ],
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index", 'align'=>'center'],
            'type'=>[ 'name'=>"Type", 'type'=>"SString", "child"=>"name"],
            'cabang'=>[ 'name'=>"Cabang", 'type'=>"SString", "child"=>"name"],
            'kota'=>[ 'name'=>"Kota", 'type'=>"String"],
            'this'=>[ 'name'=>"Nama", 'type'=>'Multi', 'children'=>[
                'name'=>[ 'name'=>"Nama", 'type'=>"String", 'iclass'=>'font-medium text-gray-700 border-b border-blue-800'],
                'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'empty'=>"Tidak Ada"]
            ]],
            'kapasitas'=>[ 'name'=>"Kapasitas", 'type'=>"Number", 'align'=>'center', 'shrink'=>true],
            'status'=>[ 'name'=>"Status", 'type'=>"State", 'shrink'=>true ],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-add
        :column="$column_add"
        :data="$data"
        unique="add"
        title="Form Add Gudang"
        button="Add Gudang"
        :error="$error"
        :select="$select"
    >
    </x-add>
    <x-table
        :datef="true"
        :column="$column_table"
        :datas="$data"
        :prop="$table"
    >
    </x-table>
@endsection
