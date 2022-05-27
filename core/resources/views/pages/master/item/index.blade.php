@extends('index', ['on'=>'item'])
@section('content')
    <?php
        $column_add = json_encode([
            'name' => [ 'name'=>'Nama', 'type'=>"String" ],
            'group_id' => [ 'name'=>'Jenis', 'type'=>"TextSel", 'api'=>'group', 'val'=>['name'], 'desc'=>['desc']],
            'classification_id' => [ 'name'=>'Klasifikasi', 'type'=>"TextSel", 'api'=>'classification', 'val'=>['name'], 'desc'=>['desc']],
            'upc'=>[ 'name'=>"Code", 'type'=>"String"],
            'desc' => [ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true ],
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index", 'shrink'=>true, 'align'=>'center'],
            'name'=>[ 'name'=>"Name", 'type'=>"String"],
            'group'=>[ 'name'=>"Group", 'type'=>"SString", 'child'=>'name'],
            // 'classification'=>[ 'name'=>"Classification", 'type'=>"SString", 'child'=>'name'],
            'upc'=>[ 'name'=>"UPC", 'type'=>"String", 'shrink'=>true ],
            'sku'=>[ 'name'=>"SKU", 'type'=>"Array", 'shrink'=>true, 'empty'=>'(Tidak ada)', 'child'=>'code', 'separator'=>''],
            'state'=>[ 'name'=>"Status", 'type'=>"SState", 'shrink'=>true, 'switch'=>[0, 1, 2], 'col'=>['red','yellow','green'], 'val'=>['NON-AKTIF','PREPARED','AKTIF']],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'shrink'=>true, 'sort'=>false, 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'shrink'=>true, 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-add
        :column="$column_add"
        unique="add"
        title="Form Add Barang"
        button="Add Barang"
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
