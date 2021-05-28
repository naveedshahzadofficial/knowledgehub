<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessLegalStatus extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['legal_name', 'legal_remark', 'legal_status'];
}
