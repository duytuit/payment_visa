<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterJudicialCertification extends Model
{
    use SoftDeletes;
    protected $table = 'register_judicial_certifications';
    protected $guarded = [];
}
