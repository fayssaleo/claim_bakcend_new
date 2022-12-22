<?php

namespace App\Modules\Claim\Models;

use App\Modules\Equipment\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;
    protected $guarded= ["id"];

    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
