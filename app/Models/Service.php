<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;
    protected $table = 'tbl_service';
    protected $fillable = [
        'patient_id',
        'service_date',
        'service_description',
        'prescription',
        'diagnosis',
        'comments'
    ];
    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

}
