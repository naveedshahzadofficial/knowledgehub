<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RlcoRequiredDocumentTypes extends Model
{
    use HasFactory;
    protected $fillable = ['rlco_id', 'rlco_required_document_id', 'document_type'];

    public function rlcoRequiredDocument(){
        return $this->belongsTo(RlcoRequiredDocument::class);
    }}
