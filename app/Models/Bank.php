<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name_e', 'name_u', 'remark', 'status'];

    public function scopeActive($query) {
        return $query->where('status', true);
    }
}
