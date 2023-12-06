<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentStructuralUnit extends Model
{
    use HasFactory;
    protected $fillable = ['department_id', 'unit_name', 'status'];

    public function scopeActive($query) {
        return $query->where('status', true);
    }

}
