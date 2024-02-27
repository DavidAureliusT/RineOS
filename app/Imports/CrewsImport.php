<?php

namespace App\Imports;

use App\Models\Crew;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CrewsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Crew([
            "name" => $row['nama'],
            "rank" => $row['rank'],
            "vessel" => $row['vessel'],
            "nik" => $row['nik'],
            "passport" => $row['passport'],
            "seaman_book" => $row['seaman_book'],
            "kk" => $row['kk'],
            "npwp" => $row['npwp'],
            "religion" => $row['religion'],
            "marital_status" => $row['marital_status'],
            "bpjs_kes" => $row['bpjs_kes'],
            "blood_type" => $row['blood_type'],
            "email" => $row['email'],
            "birthplace" => $row['birthplace'],
            "birthdate" => $row['birthdate'],
            "bank" => $row['bank'],
            "bank_account_number" => $row['bank_account_number'],
            "bank_account_owner" => $row['bank_account_owner'],
            "address" => $row['address'],
            "phone" => $row['phone'],
            "emergency_contact" => $row['emergency_contact'],
            "bpjs_tk" => "-",
            'user_id' => 1,
            'created_at' => now()
        ],);
    }
}
