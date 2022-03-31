@extends('index', ['on'=>'uom'])
@section('content')
    <?php
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index" ],
            'code'=>[ 'name'=>"Code", 'type'=>"String" ],
            'desc'=>[ 'name'=>"Name", 'type'=>"String" ],
            'decimal'=>[ 'name'=>"Decimal (Rasio from Base)", 'type'=>"Number", 'decimal'=>'10'],
            'status' => [ 'name'=>"Status", 'type'=>"State" ],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
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
