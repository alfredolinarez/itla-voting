<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectivePosition extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'state',
    ];

    public function getCandidatesAttribute() {
        return Candidate::where('position_to_which_it_aspires', $this->id)->orWhere('id', 0)->get();
    }

    public function has_voted($citizen_id) {
        $votes = Vote::all()->where('id_citizen', $citizen_id);

        foreach($votes as $vote) {
            if($vote->elective_position->id === $this->id) {
                return true;
            }
        }

        return false;
    }
}
