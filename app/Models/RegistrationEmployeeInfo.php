<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class RegistrationEmployeeInfo extends Model implements Auditable
{
    use HasFactory, \OwenIt\Auditing\Auditable;
    protected $fillable = ['registration_id', 'employee_type_id', 'male', 'female', 'transgender'];

    public function generateTags(): array
    {
        return ['Registration','Employee Info'];
    }

    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class);
    }
}