@extends('index', ['on'=>'igroup'])
@section('content')
    <?php
        $column_add = json_encode([
            'name' => [ 'name'=>'Nama', 'type'=>"String" ],
            'code'=>[ 'name'=>"Code", 'type'=>"String"],
            'desc' => [ 'name'=>"Deskripsi", 'type'=>"TextArea", 'val'=>['cost_center','cost_center_desc'], 'full'=>true ]
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index"],
            'code'=>[ 'name'=>"Code", 'type'=>"String"],
            'name'=>[ 'name'=>"Name", 'type'=>"String"],
            'desc'=>[ 'name'=>"Description", 'type'=>"TextArea", 'empty'=>"Tidak Ada"],
            'attr' => [ 'name'=>'SKU Attribute', 'type'=>"Array", 'child'=>'name', 'emptsy'=>'(Tidak ada)'],
            'status' => [ 'name'=>"Status", 'type'=>"State" ],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-add
        :column="$column_add"
        :data="$data"
        unique="add"
        title="Form Add Item Group"
        button="Add Item Group"
        :error="$error"
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
