<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company as C;
use App\Models\Employee as E;

class Company extends Model
{
    use HasFactory;
    public function employee()
    {
        return $this->hasMany(E::class, 'company_id', 'id');
    }
}
