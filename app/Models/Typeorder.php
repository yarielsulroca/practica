<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Typeorder
 *
 * @property $id
 * @property $worder_id
 * @property $problems
 * @property $date_init
 * @property $date_end
 * @property $condition
 * @property $created_at
 * @property $updated_at
 *
 * @property Service[] $services
 * @property Workorder $workorder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Typeorder extends Model
{

    static $rules = [
		'worder_id' => 'required',
		'problems' => 'required',
		'date_init' => 'required',
		'condition' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['worder_id','problems','date_init','date_end','condition'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->belongsTo('App\Models\Service', 'torder_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workorder()
    {
        return $this->hasOne('App\Models\Workorder', 'id', 'worder_id');
    }


}
