@extends('index', ['on'=>'igroup'])
@section('content')
    <?php
        $column_update = json_encode([
            'name' => [ 'name'=>'Nama', 'type'=>"String" ],
            'code'=>[ 'name'=>"Code", 'type'=>"String"],
            'desc' => [ 'name'=>"Deskripsi", 'type'=>"TextArea", 'val'=>['cost_center','cost_center_desc'], 'full'=>true ]
        ]);
        $column_add = json_encode([
            'sequence' => ['name'=>'Nilai Urutan', 'type'=>'Number', 'def'=>sizeof($header->attr)*10],
            'm_attribute_id' => [ 'name'=>'Attribute', 'type'=>"TextSel", 'api'=>"attr", 'full'=>true, 'val'=>['name'], 'desc'=>['desc']]
        ]);
        $column_table = json_encode([
            'sequence' => ['name'=>'Nilai Urutan', 'type'=>'String', 'align'=>'center', 'shrink'=>true],
            'attr' => ['name'=>'Attribute', 'type'=>'Multi', 'children'=>[
                'attribute' => ['name'=>'Attribute', 'type'=>'SString', 'child'=>'name', 'iclass'=>'font-medium text-gray-700 border-b border-blue-800'],
                'attr_desc' => ['by'=>'attribute', 'name'=>'Description', 'type'=>'SString', 'child'=>['desc']]
            ]],
            'shift' => [ 'name'=>'Shift', 'type'=>'Slot', 'shrink'=>true, 'align'=>'center'],
            'act' => [ 'name'=>"Action", 'type' => 'Delete', 'align'=>'center', 'sort'=>false ]
        ]);
    ?>
    <x-update
        :column="$column_update"
        :data="$header"
        unique="update"
        title="Form Add Item Group"
        button="Add Item Group"
        :error="$herror"
    >
    </x-update>
    <x-add
        :column="$column_add"
        unique="add"
        title="Form Add Item Group SKU Attribute"
        button="Add Item Group"
        :error="$error"
        :select="$select"
    >
    </x-add>
    <x-table
        :datef="true"
        :column="$column_table"
        :datas="$header->sku"
        :tool="false"
    >
    </x-table>
@endsection
