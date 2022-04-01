@extends('index', ['on'=>'brand'])
@section('content')<div class="md:px-6">
    <?php
        $column = json_encode([
            'm_item_id'=>[ 'name'=>"Barang", 'type'=>'String', 'full'=>false, 'def'=>'Paket'],
            'quantity'=>[ 'name'=>"Jumlah", 'type'=>'String', 'full'=>false, 'def'=>'3'],
            'note'=>[ 'name'=>"Catatan", 'type'=>'String', 'def'=>'Barang aman'],
            'created_at'=>[ 'name'=>"Created", 'type'=>'Date', 'def'=>'0'],
            'updated_at'=>[ 'name'=>"Update", 'type'=>'Date', 'def'=>'1']
        ]);
    ?>
    <x-add
    unique="email"
    title="Form Pemasukan Barang"
    :column="$column"
    :detail="true"
    button="add detail"
    >
</x-add>
<?php
    $column_table = json_encode([
        'id'=>[ 'name'=>"No", 'type'=>"Index"],
        'name'=>[ 'name'=>"Name", 'type'=>"String"],
        'quantity'=>[ 'name'=>"Jumlah", 'type'=>"String"],
        'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
    ]);

    $data = ([
        [
            'id' => 1,
            'name' => 'Pipa',
            'quantity' => '2',
        ],
        [
            'id' => 1,
            'name' => 'Gentong',
            'quantity' => '2',
        ]
    ]);
    ?>
    <x-table
        :datef="true"
        :column="$column_table"
        :datas="$data"
        :lim="false"
    >
    </x-table>
@endsection
