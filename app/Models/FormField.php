<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormField extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['form_id', 'field_label', 'field_type',
        'is_required', 'field_options', 'field_group', 'field_status', 'field_order'];

    protected $casts = [
        'field_options' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('field_status', 1);
    }
}