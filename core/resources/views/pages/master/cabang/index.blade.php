@extends('index', ['on'=>'brand'])
@section('content')
    <?php
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index", 'align'=>'center'],
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"String"],
            'status'=>[ 'name'=>"Status", 'type'=>"State" ],
            'toggle'=>[ 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-table
        :datef="true"
        :column="$column_table"
        :datas="$data"
        :prop="$table"
    >
    </x-table>
@endsection
