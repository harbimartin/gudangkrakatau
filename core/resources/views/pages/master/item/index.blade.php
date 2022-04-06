@extends('index', ['on'=>'item'])
@section('content')
    <?php
        $column_add = json_encode([
            'name' => [ 'name'=>'Nama', 'type'=>"String" ],
            'desc' => [ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true ],
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index"],
            'brand'=>[ 'name'=>"Name", 'type'=>"List"],
            'uom'=>[ 'name'=>"Capacity", 'type'=>"List"],
            'variant'=>[ 'name'=>"Variant", 'type'=>"List"],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-add
        :column="$column_add"
        :data="$data"
        unique="add"
        title="Form Add Item"
        button="Add Item"
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
