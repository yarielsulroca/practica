<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Component
 *
 * @property $id
 * @property $description
 * @property $model
 * @property $problem
 * @property $brand
 * @property $text
 * @property $name
 * @property $item_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Item $item
 * @property Operation[] $operations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Component extends Model
{

    static $rules = [
		'text' => 'required',
		'name' => 'required',
		'item_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','model','problem','brand','text','name','item_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
   public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function operations()
    {
        return $this->hasMany('App\Models\Operation', 'component_id', 'id');
    }


}
