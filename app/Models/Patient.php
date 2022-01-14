<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tbl_patient';

    protected $fillable = [
        'name'
    ];
    public function gender(): HasOne
    {
        return $this->hasOne(Gender::class);
    }

    public function service(): HasOne
    {
        return $this->hasOne(Service::class);
    }

}
