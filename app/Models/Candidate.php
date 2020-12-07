<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'party_to_which_it_belongs',
        'position_to_which_it_aspires',
        'profile_picture',
        'state',
    ];

    public function electoral_party() {
        return $this->belongsTo('App\Models\ElectoralParty', 'party_to_which_it_belongs');
    }

    public function elective_position() {
        return $this->belongsTo('App\Models\ElectivePosition', 'position_to_which_it_aspires');
    }

    public function total($election_id) {
        return Vote::where('id_election', $election_id)->where('id_candidate', $this->id)->count();
    }
}
