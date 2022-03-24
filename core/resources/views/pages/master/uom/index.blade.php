@extends('index', ['on'=>'brand'])
@section('content')
    <?php
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index" ],
            'unit'=>[ 'name'=>"Name", 'type'=>"String" ],
            'desc'=>[ 'name'=>"Capacity", 'type'=>"List" ],
            'status' => [ 'name'=>"Status", 'type'=>"State" ],
            'acts'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
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
