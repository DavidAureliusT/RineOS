<?php

namespace Database\Seeders;

use App\Imports\ContractsImport;
use App\Imports\CrewsImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class EN3000Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new CrewsImport, storage_path('data/27-2-24-import-crew-rineos.xlsx'));
        Excel::import(new ContractsImport, storage_path('data/27-2-24-import-contract-rineos.xlsx'));
    }
}
