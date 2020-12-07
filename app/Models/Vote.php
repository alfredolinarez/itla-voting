<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id_election',
        'id_citizen',
        'id_candidate',
        'id_position',
    ];

    public function candidate() {
        return $this->belongsTo('App\Models\Candidate', 'id_candidate');
    }

    public function elective_position() {
        return $this->belongsTo('App\Models\ElectivePosition', 'id_position');
    }

    public function citizen() {
        return $this->belongsTo('App\Models\Citizen', 'id_citizen');
    }

    public function election() {
        return $this->belongsTo('App\Models\Election', 'id_election');
    }
}

