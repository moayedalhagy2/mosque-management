<?php

namespace Database\Seeders;

use App\Enums\MosqueAttachmentsEnum;
use App\Enums\MosqueBuildingStatusEnum;
use App\Enums\MosqueCategoryEnum;
use App\Enums\MosqueConditionEnum;
use App\Enums\MosqueDemolitionPercentageEnum;
use App\Enums\MosqueDestructionStatusEnum;
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
            'cirty_or_village' => 'مركز المدينة',
            'is_active' => false,
            'support_friday' => true,
            'category' => MosqueCategoryEnum::A,
            'current_status' => MosqueBuildingStatusEnum::BUILT,
            'technical_status' => MosqueConditionEnum::EXCELLENT,
            'mosque_attachments' => MosqueAttachmentsEnum::SODA_AND_BASEMENT,
            'demolition_percentage' => MosqueDemolitionPercentageEnum::NONE,
            'destruction_status' => MosqueDestructionStatusEnum::NONE,
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
            'cirty_or_village' => 'راجو',
            'is_active' => false,
            'support_friday' => true,
            'category' => MosqueCategoryEnum::C,
            'current_status' => MosqueBuildingStatusEnum::UNDER_CONSTRUCTION,
            'technical_status' => MosqueConditionEnum::FAIR,
            'mosque_attachments' => MosqueAttachmentsEnum::SODA,
            'demolition_percentage' => MosqueDemolitionPercentageEnum::HALF_50,
            'destruction_status' => MosqueDestructionStatusEnum::PARTIALLY_DEMOLISHED,
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
            'cirty_or_village' => 'مركز المدينة',
            'is_active' => false,
            'support_friday' => true,
            'category' => MosqueCategoryEnum::D,
            'current_status' => MosqueBuildingStatusEnum::BUILT,
            'technical_status' => MosqueConditionEnum::FAIR,
            'mosque_attachments' => MosqueAttachmentsEnum::SODA_AND_BASEMENT,
            'demolition_percentage' => MosqueDemolitionPercentageEnum::HALF_50,
            'destruction_status' => MosqueDestructionStatusEnum::PARTIALLY_DEMOLISHED,
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
            'cirty_or_village' => 'مركز المدينة',
            'is_active' => false,
            'support_friday' => true,
            'category' => MosqueCategoryEnum::A,
            'current_status' => MosqueBuildingStatusEnum::READY,
            'technical_status' => MosqueConditionEnum::POOR,
            'mosque_attachments' => MosqueAttachmentsEnum::BASEMENT,
            'demolition_percentage' => MosqueDemolitionPercentageEnum::FULL_100,
            'destruction_status' => MosqueDestructionStatusEnum::FULLY_DEMOLISHED,
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
