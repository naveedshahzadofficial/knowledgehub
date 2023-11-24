<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['rlco_id', 'account_type', 'applicable_at_level',];

}
