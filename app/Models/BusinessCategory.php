<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['category_name','category_code', 'category_remark', 'category_status', 'sort_order'];

    public function scopeActive($query) {
        return $query->where('category_status', true);
    }
    public function businessActivities(): HasMany
    {
        return $this->hasMany(BusinessActivity::class);
    }
}
