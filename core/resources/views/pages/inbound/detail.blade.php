@extends('pages.inbound.index')
@section('detail')
    <?php
        $column = json_encode([
            'jenis'=>[ 'name'=>"Jenis", 'type'=>'String', 'full'=>false, 'def'=>'Laptop'],
            'brand'=>[ 'name'=>"Merek", 'type'=>'String', 'full'=>false, 'def'=>'ASUS'],
            'type'=>[ 'name'=>"Type", 'type'=>'String', 'full'=>false, 'def'=>'ZenBook Pro 15'],
            'm_item_id'=>[ 'name'=>"Barang", 'type'=>'String', 'full'=>false, 'def'=>'Paket'],
            'quantity'=>[ 'name'=>"Jumlah", 'type'=>'String', 'full'=>false, 'def'=>'3'],
            'note'=>[ 'name'=>"Catatan", 'type'=>'TextArea', 'def'=>'Barang aman', 'full'=>true],
        ]);
    ?>
    <x-add
        unique="new_item"
        title="Form Pemasukan Barang"
        :column="$column"
        :detail="true"
        button="Tambah Barang"
    >
        <button
            type="submit"
            hidden
            id="new"
        >Form Barang Baru</button>
    </x-add>
<?php
    $column_table = json_encode([
        'id'=>[ 'name'=>"No", 'type'=>"Index", 'shrink'=>true],
        'sku'=>[ 'name'=>"SKU", 'type'=>"String", 'shrink'=>true],
        'upc'=>[ 'name'=>"UPC", 'type'=>"String", 'shrink'=>true],
        'name'=>[ 'name'=>"Name", 'type'=>"TextArea"],
        'quantity'=>[ 'name'=>"Jumlah", 'type'=>"String", 'shrink'=>true, 'align'=>'center'],
        'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
    ]);

    $data = ([
        [
            'id' => 1,
            'sku' => 'PIRCK012A33C',
            'upc' => '144323134229',
            'name' => 'Pipa',
            'name' => 'Pipa',
            'quantity' => '2',
        ],
        [
            'id' => 1,
            'sku' => 'GNTEJJA100L23BRL',
            'upc' => '144323134229',
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
