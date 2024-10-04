<?php

namespace App\Models;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = ['first_name', 'middle_name', 'last_name',
        'cnic_no', 'mobile_no', 'username', 'email', 'password','email_verified_at', 'admin_status', 'department_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] =  bcrypt($value);
    }

    public function getAdminStatus()
    {
        return ($this->admin_status)?'Active':'Inactive';
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function sendPasswordResetNotification($token)
    {
            $this->notify(new AdminResetPasswordNotification($token));
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('Super Admin');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('Admin');
    }

    public function isDepartment(): bool
    {
        return $this->hasRole('Department User');
    }

    public function isSectoralMapper(): bool
    {
        return $this->hasRole('Sectoral Mapper');
    }
}
