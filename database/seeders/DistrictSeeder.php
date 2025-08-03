<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{

    public function run(): void
    {
        function convertToKeyedArray($array, $itemId)
        {
            return array_map(fn($item) => ['name' => $item['name'], 'code' => $item['code'], 'branch_id' => $itemId], $array);
        }


        $governates = Branch::all();
        foreach ($governates as $item) {

            $districts = config('syria_districts')[$item->name];


            District::insert(convertToKeyedArray($districts, $item->id));
        }
    }
}
