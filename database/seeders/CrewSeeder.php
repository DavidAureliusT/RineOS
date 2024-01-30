<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('crews')->insert([
            [
                "ktp" => "3674020707810014",
                "name" => "Toni Kosoyo",
                "role" => "Barge Master",
                "vessel" => "EN3000",
                "birthplace" => "Kemang",
                "birthdate" => "7-Jul-1981",
                "religion" => "Islam",
                "marital_status" => "K2",
                "blood_type" => "A+",
                "address" => "Griya Asri B8/29 A Rt.53/Rw.07, BSD City, Jelupang, Serpong Utara, Tanggerang Selatan, Banten",
                "phone" => "0813 1096 5552",
                "emergency_contact" => "08215378364",
                "email" => "Toni.kosoyo@gmail.com",
                "passport" => "C 3901987",
                "seaman_book" => "F 238911",
                "kk" => "3674022803100948",
                "npwp" => "09.845.898.7411.000",
                "bpjs_tk" => "3674 0207 0781 0014",
                "bpjs_kes" => "1816730335",
                "bank" => "Mandiri",
                "bank_account_number" => "128-00-0539424-9",
                "bank_account_owner" => "Toni Kosoyo",
                'user_id' => 1,
                'created_at' => now()
            ],
            [
                "ktp" => "3275062101730011",
                "name" => "Hendra Masdar",
                "role" => "Barge Master",
                "vessel" => "EN3000",
                "birthplace" => "Mamuju",
                "birthdate" => "21-Jan-1973",
                "religion" => "Islam",
                "marital_status" => "K3",
                "blood_type" => "O",
                "address" => "Taman Harapan Baru, Blok T5 No.08, Rt.001/Rw.025, Kelurahan Pejuang, Kecamatan Medan Satria, Bekasi Barat, Jawa Barat",
                "phone" => "081218333013",
                "emergency_contact" => "0812 1001 0217",
                "email" => "beby.thb08@gmail.com",
                "passport" => "C0164320",
                "seaman_book" => "F343838",
                "kk" => "3275060403080021",
                "npwp" => "85.236.987.2-407.000",
                "bpjs_tk" => "275 0621 0173 0011",
                "bpjs_kes" => "0001732721591",
                "bank" => "Mandiri",
                "bank_account_number" => "121-00-0799685-7",
                "bank_account_owner" => "Hendra Masdar",
                'user_id' => 1,
                'created_at' => now()
            ],
            [
                "ktp" => "3208141708750004",
                "name" => "Agus Sukmawan",
                "role" => "Barge Superintendent",
                "vessel" => "EN3000",
                "birthplace" => "Kuningan",
                "birthdate" => "17-Aug-1975",
                "religion" => "Islam",
                "marital_status" => "K3",
                "blood_type" => "O",
                "address" => "Dusun Wage, Rt.002/Rw.001, Desa Sukasari, Kecamatan Mandirancang, kuningan, Jawa Barat",
                "phone" => "0813 1314 5231",
                "emergency_contact" => "0853 1789 0640",
                "email" => "agus.sukmawan30@gmail.com",
                "passport" => "B9025759",
                "seaman_book" => "F107569",
                "kk" => "'3208142709070001",
                "npwp" => "48.565.621.9-426.000",
                "bpjs_tk" => "208 1417 0875 0004",
                "bpjs_kes" => "0000168192246",
                "bank" => "Mandiri",
                "bank_account_number" => "134-00-0996304-1",
                "bank_account_owner" => "Agus Sukmawan",
                'user_id' => 1,
                'created_at' => now()
            ],
            [
                "ktp" => "7326020905840001",
                "name" => "Medi Tandi Allo",
                "role" => "Chief Engineer",
                "vessel" => "EN3000",
                "birthplace" => "Rantepao",
                "birthdate" => "9-May-1984",
                "religion" => "Kristen",
                "marital_status" => "K3",
                "blood_type" => "O",
                "address" => "BTP Blok M No. 612, Kel, Tamalanrea, Kec. Tamalanrea, Kota Makassar - Sulawesi Selatan",
                "phone" => "082349415718",
                "emergency_contact" => "0813 9828 2706",
                "email" => "meditandiallo@gmail.com",
                "passport" => "E030388",
                "seaman_book" => "C658152",
                "kk" => "7371142706130006",
                "npwp" => "68.952.841.2-215.000",
                "bpjs_tk" => "-",
                "bpjs_kes" => "-",
                "bank" => "Mandiri",
                "bank_account_number" => "170-00-0477847-2",
                "bank_account_owner" => "Berti Lisu",
                'user_id' => 1,
                'created_at' => now()
            ],
        ]);
    }
}
