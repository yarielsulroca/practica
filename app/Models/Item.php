<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property $id
 * @property $name
 * @property $model
 * @property $casification
 * @property $brand
 * @property $description
 * @property $about
 * @property $service_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Component[] $components
 * @property Service $service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Item extends Model
{

    static $rules = [
		'name' => 'required',
		'model' => 'required',
		'casification' => 'required',
		'brand' => 'required',
		'description' => 'required',
		'about' => 'required',
		'service_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'model',
        'casification',
        'brand',
        'description',
        'about',
        'service_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function components()
    {
        return $this->hasMany('App\Models\Component', 'item_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id');
    }


}
