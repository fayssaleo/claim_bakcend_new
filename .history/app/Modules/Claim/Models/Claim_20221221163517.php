<?php

namespace App\Modules\Claim\Models;

use App\Modules\Automobile\Models\Automobile;
use App\Modules\Container\Models\Container;
use App\Modules\Equipment\Models\Equipment;
use App\Modules\Vessel\Models\Vessel;
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

    public function containers()
    {
        return $this->hasMany(Container::class);
    }

    public function vessels()
    {
        return $this->hasMany(Vessel::class);
    }

    public function automobiles()
    {
        return $this->hasMany(Automobile::class);
    }

    protected $casts = [
        'created_at' => 'datetime:m/d/Y H:i',
        'updated_at' => 'datetime:m/d/Y H:i',
        'incident_date' => 'datetime:m/d/Y',
        'claim_date' => 'datetime:m/d/Y',
    ];
}
