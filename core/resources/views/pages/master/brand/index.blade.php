@extends('index', ['on'=>'brand'])
@section('content')
    <?php
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index"],
            'name'=>[ 'name'=>"Name", 'type'=>"String"],
            'desc'=>[ 'name'=>"Job Order", 'type'=>"String"],
            'status'=>[ 'name'=>"Status", 'type'=>"State" ],
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
