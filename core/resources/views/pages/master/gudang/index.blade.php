@extends('index', ['on'=>'branch'])
@section('content')
    <?php
        $column_add = json_encode([
            'name' => [ 'name'=>'Nama', 'type'=>"String" ],
            'kota' => [ 'name'=>'Kota', 'type'=>"String" ],
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
            'kota'=>[ 'name'=>"Kota", 'type'=>"String"],
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'empty'=>"Tidak Ada"],
            'kapasitas'=>[ 'name'=>"Nama", 'type'=>"Number", 'align'=>'center'],
            'status'=>[ 'name'=>"Status", 'type'=>"State" ],
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
