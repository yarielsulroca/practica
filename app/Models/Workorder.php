<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Workorder
 *
 * @property $id
 * @property $user_id
 * @property $about
 * @property $problems
 * @property $date_init
 * @property $date_end
 * @property $client_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Budjet[] $budjets
 * @property Client $client
 * @property Typeorder[] $typeorders
 * @property Waranty[] $waranties
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Workorder extends Model
{

    static $rules = [
		'user_id' => 'required',
		'problems' => 'required',
		'date_init' => 'required',
		'client_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'about',
        'problems',
        'date_init',
        'date_end',
        'client_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budjet()
    {
        return $this->hasOne('App\Models\Budjet', 'id', 'worder_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'id', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function typeorders()
    {
        return $this->hasMany('App\Models\Typeorder', 'id', 'worder_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function waranties()
    {
        return $this->hasMany('App\Models\Waranty', 'id', 'worder_id');
    }


}
