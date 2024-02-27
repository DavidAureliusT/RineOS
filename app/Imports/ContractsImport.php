<?php

namespace App\Imports;

use App\Models\Contract;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ContractsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Contract([
            "crew_id" => $row['crew_id'],
            "code" => $row['contract_code'],
            "vessel" => $row['vessel'],
            "rank" => $row['rank'],
            "start_date" => $row['start_date_formated'],
            "end_date" => $row['end_date_formated'],
            "status" => 'expired',
            'user_id' => 1,
            'created_at' => now()
        ]);
    }
}
