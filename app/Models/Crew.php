<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'ktp',
        'name',
        'role',
        'birthplace',
        'birthdate',
        'religion',
        'marital_status',
        'blood_type',
        'address',
        'phone',
        'emergency_contact',
        'email',
        'passport',
        'seaman_book',
        'kk',
        'npwp',
        'bpjs_tk',
        'bpjs_kes',
        'bank',
        'bank_account_number',
        'bank_account_owner',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
