@extends('index', ['on'=>'attr'])
@section('content')
    <?php
        $column_add = json_encode([
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'm_uom_group_id'=>[ 'name'=>"Measure Group", 'type'=>"TextSel", 'api'=>'group', 'val'=>['name'], 'desc'=>['desc']],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true],
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index"],
            'name'=>[ 'name'=>"Name", 'type'=>"String"],
            'desc'=>[ 'name'=>"Job Order", 'type'=>"String"],
            'uom_group'=>[ 'name'=>"UoM Group", 'type'=>"SString", 'child'=>'name' ],
            'status'=>[ 'name'=>"Status", 'type'=>"State" ],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-add
        :column="$column_add"
        :data="$data"
        unique="add"
        title="Form Add Attribute"
        button="Add Attribute"
        :select="$select"
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
