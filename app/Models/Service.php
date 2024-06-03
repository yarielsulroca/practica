<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $install
 * @property $unistall
 * @property $condition
 * @property $torder_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Item[] $items
 * @property Typeorder $typeorder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{

    static $rules = [
		'name' => 'required',
		'condition' => 'required',
		'torder_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','install','unistall','condition','torder_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Item', 'service_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typeorder()
    {
        return $this->belongsTo('App\Models\Typeorder', 'id', 'torder_id');
    }


}
