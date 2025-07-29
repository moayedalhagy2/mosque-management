<?php

namespace Database\Seeders;

use App\Enums\MosqueBuildingStatusEnum;
use App\Enums\MosqueCategoryEnum;
use App\Enums\MosqueConditionEnum;
use App\Enums\MosqueTypeEnum;
use App\Models\Branch;
use App\Models\Mosque;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MosqueSeeder extends Seeder
{



    //الانتباه الى موضوع اضافة رقم فرع ورقم منطقة مخالف
    public function run(): void
    {
        $allepo = Branch::where('name', 'حلب')->first();
        $idleb = Branch::where('name', 'إدلب')->first();
        $homs = Branch::where('name', 'حمص')->first();

        //1
        Mosque::create([
            'name' => 'مسجد عمر بن الخطاب',
            'branch_id' => $allepo->id,
            'district_id' => $allepo->districts[0]->id,
            'category' => MosqueCategoryEnum::A,
            'current_status' => MosqueBuildingStatusEnum::ACTIVE,
            'technical_status' => MosqueConditionEnum::EXCELLENT,
            'latitude' => 33.84231,
            'longitude' => 34.62145,
        ])
            ->types()
            ->createMany([
                ['type' => MosqueTypeEnum::GENERAL],
                ['type' => MosqueTypeEnum::HISTORICAL],
            ]);

        //2
        Mosque::create([
            'name' => 'مسجد الزبير بن العوام',
            'branch_id' => $allepo->id,
            'district_id' => $allepo->districts[1]->id,
            'category' => MosqueCategoryEnum::C,
            'current_status' => MosqueBuildingStatusEnum::INACTIVE,
            'technical_status' => MosqueConditionEnum::FAIR,
            'latitude' => 33.11131,
            'longitude' => 34.66145,
        ])
            ->types()
            ->createMany([
                ['type' => MosqueTypeEnum::GENERAL]
            ]);

        //3
        Mosque::create([
            'name' => 'مسجد عائشة',
            'branch_id' => $idleb->id,
            'district_id' => $idleb->districts[0]->id,
            'category' => MosqueCategoryEnum::D,
            'current_status' => MosqueBuildingStatusEnum::ACTIVE,
            'technical_status' => MosqueConditionEnum::FAIR,
            'latitude' => 33.11131,
            'longitude' => 34.66145,
        ])
            ->types()
            ->createMany([
                ['type' => MosqueTypeEnum::GENERAL]
            ]);

        //4
        Mosque::create([
            'name' => 'مسجد فاطمة',
            'branch_id' => $homs->id,
            'district_id' => $homs->districts[0]->id,
            'category' => MosqueCategoryEnum::A,
            'current_status' => MosqueBuildingStatusEnum::PARTIALLY_DESTROYED,
            'technical_status' => MosqueConditionEnum::POOR,
            'latitude' => 33.13431,
            'longitude' => 34.63442,
        ])
            ->types()
            ->createMany([

                ['type' => MosqueTypeEnum::MINISTERIAL],
                ['type' => MosqueTypeEnum::CENTRAL]

            ]);
    }
}
