@extends('index', ['on'=>'attr'])
@section('content')
    <?php
        $column_header = json_encode([
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'm_uom_group_id'=>[ 'name'=>"Measure Group", 'type'=>"TextSel", 'api'=>'group', 'val'=>['name'], 'desc'=>['desc']],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true],
        ]);
        $column_add = json_encode([
            'name'=>[ 'name'=>"Nama", 'type'=>"String"],
            'm_uom_group_id'=>[ 'name'=>"Measure Group", 'type'=>"TextSel", 'api'=>'group', 'val'=>['name'], 'desc'=>['desc']],
            'desc'=>[ 'name'=>"Deskripsi", 'type'=>"TextArea", 'full'=>true],
        ]);
        $column_table = json_encode([
            'id'=>[ 'name'=>"No", 'type'=>"Index"],
            'name'=>[ 'name'=>"Name", 'type'=>"String"],
            'desc'=>[ 'name'=>"Job Order", 'type'=>"String"],
            'uom_group'=>[ 'name'=>"UoM Group", 'type'=>"SString", 'child'=>'name' ],
            'status'=>[ 'name'=>"Status", 'type'=>"State" ],
            'toggle'=>[ 'by'=>'status', 'name'=>"Aktifkan", 'type'=>'Toggle', 'sort'=>false, 'align'=>'center'],
            'act'=>[ 'name'=>"Action", 'type' => 'Edit', 'align'=>'center', 'sort'=>false]
        ]);
    ?>
    <x-update
        :column="$column_header"
        :data="$header"
        unique="update"
        title="Atribut"
        :select="$select"
        :error="$error"
    >
    </x-update>
@endsection
