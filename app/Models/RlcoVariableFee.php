<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RlcoVariableFee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rlco_id', 'title', 'unit', 'unit_quantity', 'price', 'order', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
