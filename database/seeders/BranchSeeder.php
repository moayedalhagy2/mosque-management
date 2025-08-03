<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            [
                "name" => 'دمشق',
                'code' => 'SY01'
            ],
            [
                "name" => 'ريف دمشق',
                'code' => 'SY03'
            ],
            [
                "name" => 'حلب',
                'code' => 'SY02'
            ],
            [
                "name" => 'حمص',
                'code' => 'SY04'
            ],
            [
                "name" => 'حماة',
                'code' => 'SY05'
            ],
            [
                "name" => 'اللاذقية',
                'code' => 'SY06'
            ],
            [
                "name" => 'طرطوس',
                'code' => 'SY10'
            ],
            [
                "name" => 'إدلب',
                'code' => 'SY07'
            ],
            [
                "name" => 'درعا',
                'code' => 'SY12'
            ],
            [
                "name" => 'القنيطرة',
                'code' => 'SY14'
            ],
            [
                "name" => 'السويداء',
                'code' => 'SY13'
            ],
            [
                "name" => 'دير الزور',
                'code' => 'SY09'
            ],
            [
                "name" => 'الرقة',
                'code' => 'SY11'
            ],
            [
                "name" => 'الحسكة',
                'code' => 'SY08'
            ]
        ];

        foreach ($governorates as $item) {
            Branch::create($item);
        }
    }
}
