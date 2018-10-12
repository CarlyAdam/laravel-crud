<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Professor extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'professors';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'lastname',
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function students()
        {
            return $this->hasMany('App\Students');
        }
}
