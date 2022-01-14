<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gender extends Model
{
    use HasFactory;
    protected $table = 'tbl_gender';
    protected $fillable = [
        'patient_id',
        'gender'
    ];
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }
}
