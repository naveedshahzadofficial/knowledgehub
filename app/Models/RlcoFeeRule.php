<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RlcoFeeRule extends Model
{

    // Define the relationship to RlcoUserInput (one-to-many)
    public function rlcoUserInputs()
    {
        return $this->hasMany(RlcoUserInput::class);
    }

    // Define the inverse relationship to RlcoFeeType (many-to-one)
    public function feeType()
    {
        return $this->belongsTo(RlcoFeeType::class);
    }

    protected $fillable = ['rlco_fee_type_id', 'category', 'calculation_type', 'rate', 'minimum_fee', 'fixed_fee', 'unit', 'order', 'status', 'percentage'];
}
