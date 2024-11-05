<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormTableRow extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['form_id', 'row_name', 'row_status', 'row_order',];

    public function scopeActive($query)
    {
        return $query->where('row_status', 1);
    }
}
