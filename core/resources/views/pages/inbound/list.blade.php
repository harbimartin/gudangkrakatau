@extends('index', ['on'=>'inbound.list'])
@section('content')
    <?php
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index", 'align'=>'center'],
            'gudang' => [ 'name'=>'Gudang', 'type'=>"SString", 'child'=>'name'],
            'transport' => [ 'name'=>'Angkutan', 'type'=>"SString", 'child'=>'name'],
            'receiver' => [ 'name'=>'Penerima', 'type'=>"SString", 'child'=>'name'],
            'note'=>[ 'name'=>"Catatan", 'type'=>'TextArea', 'full'=>true],
            'supir'=>[ 'name'=>"Supir", 'type'=>'String'],
            'asal' => [ 'name'=>'Asal', 'type'=>"SString", 'child'=>'name'],
            'receive_at'=>[ 'name'=>"Diterima", 'type'=>'Date' , 'def'=>'0'],
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
