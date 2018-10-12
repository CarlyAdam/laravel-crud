<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','lastname','professors_id'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

     public function professors()
    {
    	return $this->belongsTo('App\Professors');
    }

}
