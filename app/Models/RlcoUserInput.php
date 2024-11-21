<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RlcoUserInput extends Model
{

    // Define the inverse relationship to RlcoFeeRule (many-to-one)
    public function feeRule()
    {
        return $this->belongsTo(RlcoFeeRule::class);
    }

    protected $fillable = ['rlco_fee_rule_id', 'input_name', 'input_label', 'input_type', 'validation_rules', 'status'];
}
