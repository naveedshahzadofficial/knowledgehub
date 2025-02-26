<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dependency extends Model
{
    use HasFactory;
    protected $fillable = ['rlco_id', 'rlco_selection_mode', 'parent_rlco_id' , 'department_id','activity_name','remark','admin_id','dependency_status', 'priority',];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function parentRlco(): BelongsTo
    {
        return $this->belongsTo(Rlco::class, 'parent_rlco_id');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->admin_id = auth()->guard('admin')->id();
        });
    }
}
