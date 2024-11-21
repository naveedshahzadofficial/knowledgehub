<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RlcoFeeType extends Model
{

    // Define the relationship to RlcoFeeRule (one-to-many)
    public function rlcoFeeRules()
    {
        return $this->hasMany(RlcoFeeRule::class);
    }

    // Define the inverse relationship to Rlco (many-to-one)
    public function rlco()
    {
        return $this->belongsTo(Rlco::class);
    }

    protected $fillable = ['rlco_id', 'name', 'description', 'calculation_period', 'order', 'status'];
}
