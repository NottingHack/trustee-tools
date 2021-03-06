<?php

namespace App\HMSModels;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
