<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1;$i <= 20; $i++)
        {
            $arr[] = [
                'name' => "Table " . $i,
                'code' => "T_" . Str::Random(10),
            ];
        }

        Table::insert($arr);
    }
}
