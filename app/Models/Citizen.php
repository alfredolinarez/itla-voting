<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $primaryKey = 'identification_document';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'identification_document',
        'first_name',
        'last_name',
        'email',
        'state',
    ];
}
