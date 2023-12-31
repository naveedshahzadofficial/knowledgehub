<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequiredDocument extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['document_title','document_short_name','document_remarks', 'document_status'];

}
