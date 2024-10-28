<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['form_name', 'form_status', 'form_order'];

    public function scopeActive($query)
    {
        return $query->where('form_status', 1);
    }

    public function rlcos()
    {
        return $this->belongsToMany(Rlco::class);
    }

    public function formFields()
    {
        return $this->hasMany(FormField::class);
    }
}
