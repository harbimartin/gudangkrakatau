@extends('index', ['on'=>'t-group'])
@section('content')
    <?php
        $column_add = json_encode([
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'code'=>[ 'name'=>"Code", 'type'=>"String"],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true],
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index" ],
            'name'=>[ 'name'=>"Name", 'type'=>"String" ],
            'code'=>[ 'name'=>"Name", 'type'=>"String" ],
            'desc'=>[ 'name'=>"Desc", 'type'=>"String" ],
            'status' => [ 'name'=>"Status", 'type'=>"State", 'align'=>'center'],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
            'acts'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-add
        :column="$column_add"
        :data="$data"
        unique="add"
        title="Form Tambah Grup Angkutan"
        button="Tambahkan Grup Angkutan"
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
