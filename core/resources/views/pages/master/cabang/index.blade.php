@extends('index', ['on'=>'cabang'])
@section('content')
    <?php
        $column_add = json_encode([
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true],
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index", 'align'=>'center'],
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'empty'=>"Tidak Ada"],
            'status'=>[ 'name'=>"Status", 'type'=>"State" ],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-add
        :column="$column_add"
        :data="$data"
        unique="add"
        title="Form Add Cabang"
        button="Add Cabang"
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
