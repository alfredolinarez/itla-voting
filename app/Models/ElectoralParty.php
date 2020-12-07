<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectoralParty extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'party_logo',
        'state',
    ];

    public function candidates() {
        return $this->hasMany('App\Models\Candidate', 'party_to_which_it_belongs');
    }

    public function total($election_id) {
        $votes = Vote::where('id_election', $election_id)->get();

        $votes = $votes->filter(function($vote) {
            return $vote->candidate->electoral_party->id === $this->id;
        });

        return count($votes);
    }
}
