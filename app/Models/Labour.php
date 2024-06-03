<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Labour
 *
 * @property $id
 * @property $value
 * @property $tax
 * @property $budjet_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Budjet $budjet
 * @property Operation[] $operations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Labour extends Model
{

    static $rules = [
		'value' => 'required',
		'tax' => 'required',
		'budjet_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['value','tax','budjet_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function budjet()
    {
        return $this->belongsTo('App\Models\Budjet', 'id', 'budjet_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\Operation', 'labour_id', 'id');
    }


}
