<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company as C;
use App\Models\Employee as E;

class Employee extends Model
{
    use HasFactory;
    public function company ()
    {
        return $this->belongsTo(C::class, 'company_id', 'id');
    }
}
