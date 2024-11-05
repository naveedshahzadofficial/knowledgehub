<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormTableColumn extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['form_id', 'column_name', 'column_status', 'column_order',];

    public function scopeActive($query)
    {
        return $query->where('column_status', 1);
    }
}
