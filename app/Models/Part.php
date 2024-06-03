<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Part
 *
 * @property $id
 * @property $categorie
 * @property $code
 * @property $mark
 * @property $price
 * @property $features
 * @property $provider
 * @property $date_init
 * @property $date_out
 * @property $quantity
 * @property $costunit
 * @property $saleprice
 * @property $tax
 * @property $gain
 * @property $inflation
 * @property $typepurchase
 * @property $budjet_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Budjet $budjet
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Part extends Model
{

    static $rules = [
		'price' => 'required',
		'quantity' => 'required',
		'saleprice' => 'required',
		'typepurchase' => 'required',
		'budjet_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['categorie','code','mark','price','features','provider','date_init','date_out','quantity','costunit','saleprice','tax','gain','inflation','typepurchase','budjet_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function budjet()
    {
        return $this->belongsTo('App\Models\Budjet', 'id', 'budjet_id');
    }


}
