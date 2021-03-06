<?php

use App\Cabang;
use App\CabangGroup;
use App\CabangGroupMenu;
use App\Group;
use App\GroupMenu;
use App\MasterAttribute;
use App\MasterItemAttribute;
use App\MasterItemGroup;
use App\MasterUnitGroup;
use App\MasterUnitMeasure;
use App\Menu;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Current;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        Cabang::insert(array([
            'name' => 'Jakarta',
        ],[
            'name' => 'Bandung',
        ]));
        Group::insert(array([
            'name' => 'Admin',
        ],[
            'name' => 'Keuangan',
        ]));
        CabangGroup::insert(array([
            'm_cabang_id' => 1,
            'group_id' => 1
        ]));
        User::insert(array([
            'username' => 'admin',
            'name' => 'adii',
            'password' => bcrypt('123456'),
            'email' => 'adi@gmail.com',
            // 'group_id' => 1
        ]));
        Menu::insert(array([
            'parent' => null,
            'key' => 'man',
            'name' => 'Manajemen',
            'icon' => 0
        ],[
            'parent' => null,
            'key' => 'master',
            'name' => 'Data Master',
            'icon' => 0
        ],[
            'parent' => null,
            'key' => 'trans',
            'name' => 'Transaksi',
            'icon' => 0
        ],[
            'parent' => null,
            'key' => 'proc',
            'name' => 'Proses',
            'icon' => 0
        ],[
            'parent' => 2,
            'key' => 'wh',
            'name' => 'Pergudangan',
            'icon' => 0
        ],[
            'parent' => 2,
            'key' => 'it',
            'name' => 'Pembarangan',
            'icon' => 0
        ],[
            'parent' => 2,
            'key' => 'mv',
            'name' => 'Perpindahan',
            'icon' => 0
        ],[
            'parent' => 1,
            'key' => 'menu-man',
            'name' => 'Menu',
            'icon' => 1
        ],[
            'parent' => 1,
            'key' => 'user-man',
            'name' => 'User',
            'icon' => 1
        ],[
            'parent' => 1,
            'key' => 'group',
            'name' => 'Grup',
            'icon' => 1
        ],[
            'parent' => 5,
            'key' => 'branch',
            'name' => 'Cabang',
            'icon' => 1
        ],[
            'parent' => 5,
            'key' => 'whtype',
            'name' => 'Tipe Gudang',
            'icon' => 1
        ],[
            'parent' => 5,
            'key' => 'whouse',
            'name' => 'Gudang',
            'icon' => 1
        ],[
            'parent' => 7,
            'key' => 'origin',
            'name' => 'Asal',
            'icon' => 1
        ],[
            'parent' => 6,
            'key' => 'igroup',
            'name' => 'Jenis',
            'icon' => 1
        ],[
            'parent' => 6,
            'key' => 'iclass',
            'name' => 'Klasifikasi',
            'icon' => 1
        ],[
            'parent' => 6,
            'key' => 'attr',
            'name' => 'Atribut',
            'icon' => 1
        ],[
            'parent' => 6,
            'key' => 'item',
            'name' => 'Barang',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'uom',
            'name' => 'Satuan',
            'icon' => 1
        ],[
            'parent' => 7,
            'key' => 't_group',
            'name' => 'Grup Angkutan',
            'icon' => 1
        ],[
            'parent' => 7,
            'key' => 't-port',
            'name' => 'Angkutan',
            'icon' => 1
        ],[
            'parent' => 3,
            'key' => 'inbound',
            'name' => 'Pemasukan',
            'icon' => 2
        ],[
            'parent' => 3,
            'key' => 'inbound.list',
            'name' => 'Pemasukan',
            'icon' => 1
        ],[
            'parent' => 3,
            'key' => 'crossdock',
            'name' => 'Pemindahan',
            'icon' => 1
        ],[
            'parent' => 3,
            'key' => 'outbound',
            'name' => 'Pengeluaran',
            'icon' => 1
        ],[
            'parent' => 4,
            'key' => 'assemble',
            'name' => 'Perakitan',
            'icon' => 1
        ],[
            'parent' => 4,
            'key' => 'disassemble',
            'name' => 'Pembongkaran',
            'icon' => 1
        ]));

        CabangGroupMenu::insert(array([
            'm_cabang_group_id' => 1,
            'm_menu_id' => 1
        ]));

        define('Length',1);
        define('Mass',2);
        define('Time',3);
        define('Temperature',4);
        define('Current',5);
        define('Voltage',6);
        define('Area',7);
        define('Volume',8);
        define('LuminousEnergy',9);
        define('LuminousFlux',10);
        define('LuminousIntensity',11);
        define('Luminance',12);
        define('Illuminance',13);
        define('Digital',14);
        define('Sales',15);
        define('Package',16);
        MasterUnitGroup::insert(
            array([
                'name' => 'Length',
                'desc' => 'the measurement or extent of something from end to end',
                'status' => 1
            ],[
                'name' => 'Mass',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Time',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Temperature',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Current',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Voltage',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Package',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Area',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Volume',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'LuminousEnergy',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'LuminousFlux',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'LuminousIntensity',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Luminance',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Digital',
                'desc' => 'Digital Information, Data Size',
                'status' => 1
            ],[
                'name' => 'Sales',
                'desc' => '-',
                'status' => 1
            ],[
                'name' => 'Package',
                'desc' => '-',
                'status' => 1
            ])
        );
        $record = array();
        $prefix = array([
                'prefix' => 'n',
                'power' => -9,
                'desc' => 'Nano'
            ],[
                'prefix' => '??',
                'power' => -6,
                'desc' => 'Micro'
            ],[
                'prefix' => 'm',
                'power' => -3,
                'desc' => 'Mili'
            ],[
                'prefix' => 'c',
                'power' => -2,
                'desc' => 'Centi'
            ],[
                'prefix' => 'd',
                'power' => -1,
                'desc' => 'Desi'
            ],[
                'prefix' => '',
                'power' => 0,
                'desc' => ''
            ],[
                'prefix' => 'da',
                'power' => 1,
                'desc' => 'Deca'
            ],[
                'prefix' => 'h',
                'power' => 2,
                'desc' => 'Hecto'
            ],[
                'prefix' => 'k',
                'power' => 3,
                'desc' => 'Kilo'
            ],[
                'prefix' => 'M',
                'power' => 6,
                'desc' => 'Mega'
            ],[
                'prefix' => 'G',
                'power' => 9,
                'desc' => 'Giga'
            ],[
                'prefix' => 'T',
                'power' => 12,
                'desc' => 'Tera'
            ],[
                'prefix' => 'P',
                'power' => 15,
                'desc' => 'Peta'
            ]
        );
        $prefix2 = array([
                'prefix' => '',
                'power' => 0,
                'desc' => ''
            ],[
                'prefix' => 'k',
                'power' => 1,
                'desc' => 'Kilo'
            ],[
                'prefix' => 'M',
                'power' => 2,
                'desc' => 'Mega'
            ],[
                'prefix' => 'G',
                'power' => 3,
                'desc' => 'Giga'
            ],[
                'prefix' => 'T',
                'power' => 4,
                'desc' => 'Tera'
            ],[
                'prefix' => 'P',
                'power' => 5,
                'desc' => 'Peta'
            ]
        );
        // Length
        foreach($prefix as $p){
            array_push($record, [
                'code' => $p['prefix'].'m',
                'decimal' => pow(10, $p['power']),
                'desc' => ucfirst($p['desc'].'metre'),
                'group_id' => Length,
                'status' => 1
            ]);
        }
        // Digital Information, Data Size
        foreach($prefix2 as $p){
            array_push($record, [
                'code' => $p['prefix'].'B',
                'decimal' => pow(1000, $p['power']),
                'desc' => ucfirst($p['desc'].'byte'),
                'group_id' => Digital,
                'status' => 1
            ]);
        }
        foreach($prefix2 as $p){
            array_push($record, [
                'code' => $p['prefix'].'B',
                'decimal' => pow(1000, $p['power']),
                'desc' => ucfirst(substr($p['desc'], 0, -2).'bibyte'),
                'group_id' => Digital,
                'status' => 1
            ]);
        }
        // Mass
        foreach($prefix as $p){
            array_push($record, [
                'code' => $p['prefix'].'g',
                'decimal' => pow(10, $p['power']),
                'desc' => ucfirst($p['desc'].'gram'),
                'group_id' => Mass,
                'status' => 1
            ]);
        }
        // Time
        $record = array_merge($record, array([
                'code' => '??',
                'decimal' => 0.001,
                'desc' => 'Micro Second',
                'group_id' => Time,
                'status' => 1
            ],[
                'code' => 's',
                'decimal' => 1,
                'desc' => 'Second',
                'group_id' => Time,
                'status' => 1
            ],[
                'code' => 'm',
                'decimal' => 60,
                'desc' => 'Minute',
                'group_id' => Time,
                'status' => 1
            ],[
                'code' => 'h',
                'decimal' => 3600,
                'desc' => 'Hour',
                'group_id' => Time,
                'status' => 1
            ],[
                'code' => 'day',
                'decimal' => 3600 * 24,
                'desc' => 'Day',
                'group_id' => Time,
                'status' => 1
            ],[
                'code' => 'week',
                'decimal' => 3600 * 24 * 7,
                'desc' => 'Week',
                'group_id' => Time,
                'status' => 1
            ]
        ));
        // Temperature
        $record = array_merge($record, array([
                'code' => 'K',
                'decimal' => 0,
                'desc' => 'Kelvin',
                'group_id' => Temperature,
                'status' => 1
            ],[
                'code' => '??C',
                'decimal' => 0,
                'desc' => 'Celcius',
                'group_id' => Temperature,
                'status' => 1
            ],[
                'code' => '??F',
                'decimal' => 0,
                'desc' => 'Fahrenheit',
                'group_id' => Temperature,
                'status' => 1
            ]
        ));
        // Current
        foreach($prefix2 as $p){
            array_push($record, [
                'code' => $p['prefix'].'A',
                'decimal' => pow(1000, $p['power']),
                'desc' => ucfirst($p['desc'].'ampere'),
                'group_id' => Current,
                'status' => 1
            ]);
        }
        // Voltage
        foreach($prefix2 as $p){
            array_push($record, [
                'code' => $p['prefix'].'V',
                'decimal' => pow(1000, $p['power']),
                'desc' => ucfirst($p['desc'].'volt'),
                'group_id' => Voltage,
                'status' => 1
            ]);
        }
        // Area
        foreach($prefix as $p){
            if ($p['power']<=3)
                array_push($record, [
                    'code' => $p['prefix'].'m??',
                    'decimal' => pow(10, $p['power']*2),
                    'desc' => 'Square '.ucfirst($p['desc'].'meter'),
                    'group_id' => Area,
                    'status' => 1
                ]);
        }
        $record = array_merge($record, array([
            'code' => 'ha',
            'decimal' => 10000,
            'desc' => 'Hectare',
            'group_id' => Area,
            'status' => 1
        ],[
            'code' => 'acre',
            'decimal' => 4046.86,
            'desc' => 'Acre',
            'group_id' => Area,
            'status' => 1
        ]));
        // Volume
        foreach($prefix as $p){
            if ($p['power']<=3)
                array_push($record, [
                    'code' => $p['prefix'].'m??',
                    'decimal' => pow(10, $p['power']*3),
                    'desc' => "Cubic ".ucfirst($p['desc'].'metre'),
                    'group_id' => Volume,
                    'status' => 1
                ]);
        }
        $record = array_merge($record, array([
                'code' => 'cc',
                'desc' => 'Cubic Centimetre',
                'decimal' => 1,
                'group_id' => Volume,
                'status' => 1
            ],[
                'code' => 'barrel',
                'desc' => 'Cubic Metre',
                'decimal' => 0.158987294928,
                'group_id' => Volume,
                'status' => 1
            ],[
                'code' => 'ft??',
                'desc' => 'Cubic Foot',
                'decimal' => 0.028316846592,
                'group_id' => Volume,
                'status' => 1
            ],[
                'code' => 'cdm',
                'desc' => 'Cubic Decimetre',
                'decimal' => 0.001,
                'group_id' => Volume,
                'status' => 1
            ],[
                'code' => 'L',
                'desc' => 'Litre',
                'decimal' => 0.001,
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => 'kL',
                'desc' => 'Kilolitre',
                'decimal' => 1,
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => 'gal (us)',
                'desc' => 'Gallon (US)',
                'decimal' => 0.003785411784,
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => 'pint (us)',
                'desc' => 'Pint (US)',
                'decimal' => 0.00473176473,
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => 'gal',
                'desc' => 'Gallon',
                'decimal' => 0.00454,
                'group_id' => Sales,
                'status' => 1
            ]
        ));
        // Luminous
        $record = array_merge($record, array([
                'code' => 'lm.s',
                'decimal' => 1,
                'desc' => "Lumen Second",
                'group_id' => LuminousEnergy,
                'status' => 1
            ],[
                'code' => 'lm',
                'decimal' => 1,
                'desc' => "Lumen",
                'group_id' => LuminousFlux,
                'status' => 1
            ],[
                'code' => 'cd',
                'decimal' => 1,
                'desc' => "Candela",
                'group_id' => LuminousIntensity,
                'status' => 1
            ],[
                'code' => 'cd/m??',
                'decimal' => 1,
                'desc' => "Candela per Square Metre",
                'group_id' => Luminance,
                'status' => 1
            ],[
                'code' => 'lx',
                'decimal' => 1,
                'desc' => "Lumen per Square Metre",
                'group_id' => Illuminance,
                'status' => 1
            ]
        ));
        // Sales
        $record = array_merge($record, array([
                'code' => 'Pack',
                'decimal' => 0,
                'desc' => 'Pack',
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => '6Pack',
                'decimal' => 0,
                'desc' => '6Pack',
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => 'Carton',
                'decimal' => 0,
                'desc' => 'Carton',
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => 'Pallet',
                'decimal' => 0,
                'desc' => 'Pallet',
                'group_id' => Sales,
                'status' => 1
            ],[
                'code' => 'SmlPack',
                'decimal' => 0,
                'desc' => 'SmlPack',
                'group_id' => Sales,
                'status' => 1
            ]
        ));
        // Package
        $record = array_merge($record, array([
                'code' => 'Box',
                'decimal' => 0,
                'desc' => 'Box',
                'group_id' => Package,
                'status' => 1
            ],[
                'code' => 'Pallet',
                'decimal' => 0,
                'desc' => 'Pallet',
                'group_id' => Package,
                'status' => 1
            ],[
                'code' => 'Container',
                'decimal' => 0,
                'desc' => 'Container',
                'group_id' => Package,
                'status' => 1
            ],[
                'code' => 'Barrel',
                'decimal' => 0,
                'desc' => 'Barrel',
                'group_id' => Package,
                'status' => 1
            ]
        ));
        MasterUnitMeasure::insert($record);

        MasterItemGroup::insert(array([
            'name' => 'Laptop',
            'code' => 'LP',
            'desc' => '-',
            'status' => 1
        ]));
        MasterAttribute::insert(array([
            'name' => 'Brand',
            'desc' => '-',
            'status' => 1
        ],[
            'name' => 'Model',
            'desc' => 'Nama Model Barang',
            'status' => 1
        ],[
            'name' => 'RAM Size',
            'desc' => 'Besar Ukuran Random Access Memory',
            'status' => 1
        ],[
            'name' => 'Processor',
            'desc' => 'Nama IC Processor',
            'status' => 1
        ],[
            'name' => 'Color',
            'desc' => 'Warna',
            'status' => 1
        ]));
    }
}
