@extends('index', ['on'=>'user-man'])
@section('content')
    <?php
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index"],
            'username'=>[ 'name'=>"Name", 'type'=>"String"],
            'name'=>[ 'name'=>"Name", 'type'=>"String"],
            'jabatan'=>[ 'name'=>"Name", 'type'=>"String"],
            'email'=>[ 'name'=>"Name", 'type'=>"String"],
            'status' => [ 'name'=>"Status", 'type'=>"State" ],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
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
