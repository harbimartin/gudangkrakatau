@extends('pages.inbound.index')
@section('detail')
    <?php
        $column = json_encode([
            'm_item_id' => [ 'name'=>'Barang', 'type'=>"TextSel", 'api'=>'item', 'val'=>['hard_sku', 'name'], 'desc'=>['desc'], 'full'=>true],
            'quantity'=>[ 'name'=>"Jumlah", 'type'=>'Number', 'full'=>false],
        ]);
    ?>
    <x-add
        unique="new_item"
        title="Form Pemasukan Barang"
        :column="$column"
        :detail="true"
        button="Tambah Barang"
        :select="$select"
        :error="$error"
    >
        <button
            type="submit"
            hidden
            id="new"
        >Form Barang Baru</button>
    </x-add>
<?php
    $column_table = json_encode([
        'id'=>[ 'name'=>"No", 'type'=>"Index", 'shrink'=>true, 'align'=>'center'],
        'this'=>[ 'name'=>"Nama", 'type'=>'Multi', 'children'=>[
            'name'=>[ 'name'=>"Nama", 'type'=>"String", 'iclass'=>'font-medium text-gray-700 border-b border-blue-800'],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'empty'=>"Tidak Ada"]
        ]],
        'class' => [ 'name'=>'Classification/Group', 'type'=>'Multi', 'children'=>[
            'group'=>[ 'name'=>"Group", 'type'=>"SString", 'child'=>'name', 'iclass'=>'font-medium text-gray-500'],
            'classification'=>[ 'name'=>"Classification", 'type'=>"SString", 'child'=>'name']
        ]],
        'codes' => [ 'name'=>'UPC/SKU', 'type'=>'Multi', 'children'=>[
            'upc'=>[ 'name'=>"UPC", 'type'=>"String", 'shrink'=>true, 'iclass'=>'font-medium text-gray-700'],
            'sku'=>[ 'name'=>"SKU", 'type'=>"Array", 'shrink'=>true, 'empty'=>'(Tidak ada)', 'child'=>'code', 'separator'=>'', 'iclass'=>'text-gray-500'],
        ]],
        'quantity'=>[ 'name'=>"Quantity", 'type'=>"String", 'shrink'=>true, 'align'=>'right' ],
        // 'state'=>[ 'name'=>"Status", 'type'=>"SState", 'shrink'=>true, 'switch'=>[0, 1, 2], 'col'=>['red','yellow','green'], 'val'=>['NON-AKTIF','PREPARED','AKTIF']],
        // 'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'shrink'=>true, 'sort'=>false, 'align'=>'center'],
        'act'=>[ 'name'=>"Action", 'type' => 'Delete', 'shrink'=>true, 'align'=>'center', 'sort'=>false]
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
