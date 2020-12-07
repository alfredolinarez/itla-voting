<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'date_of_realization',
        'state',
    ];

    public function getElectoralPartiesAttribute() {
        $electoral_parties = ElectoralParty::all()->sort(function($partyA, $partyB) {
            return $partyA->total($this->id) < $partyB->total($this->id);
        });

        return $electoral_parties;
    }

}
