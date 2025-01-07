<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormField extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['form_id', 'field_label', 'field_type', 'date_type', 'max_date' ,'is_array',
        'is_required', 'field_options', 'field_group', 'field_status', 'field_order', 'form_table_row_id', 'form_table_column_id'];

    protected $casts = [
        'field_options' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('field_status', 1);
    }

    public function formTableRow(): BelongsTo
    {
        return $this->belongsTo(FormTableRow::class);
    }

    public function formTableColumn(): BelongsTo
    {
        return $this->belongsTo(FormTableColumn::class);
    }
}
