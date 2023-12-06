<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['account_info_id', 'province_id', 'district_id', 'tehsil_id',
        'bank_id', 'branch', 'account_title', 'account_no', 'payment_service_id', 'department_structural_unit_id'
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
    public function tehsil(): BelongsTo
    {
        return $this->belongsTo(Tehsil::class);
    }
    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }

    public function departmentStructuralUnit(): BelongsTo
    {
        return $this->belongsTo(DepartmentStructuralUnit::class);
    }
}
