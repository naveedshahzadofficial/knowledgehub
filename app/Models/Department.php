<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_id','department_name','department_display_name', 'department_id', 'department_scope', 'province_id', 'department_remark', 'department_status'];


    public function scopeActive($query) {
        return $query->where('department_status', true);
    }

    public function rlcos(): HasMany
    {
        return $this->hasMany(Rlco::class);
    }

    public function getDepartmentStatus(): string
    {
        return ($this->department_status)?'Active':'Inactive';
    }

    public function parentDepartment(): BelongsTo
    {
        return $this->belongsTo(self::class, 'department_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
