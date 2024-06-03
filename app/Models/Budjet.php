<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Budjet
 *
 * @property $id
 * @property $value
 * @property $value_dolar
 * @property $operation_value
 * @property $forma_pago
 * @property $worder_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Labour[] $labours
 * @property Part[] $parts
 * @property Workorder $workorder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Budjet extends Model
{

    static $rules = [
        'value' => 'required',
        'value_dolar' => 'required',
        'operation_value' => 'required',
        'forma_pago' => 'required',
        'worder_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'value_dolar',
        'operation_value',
        'forma_pago',
        'worder_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function labours()
    {
        return $this->hasMany('App\Models\Labour', 'budjet_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parts()
    {
        return $this->hasMany('App\Models\Part', 'budjet_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workorder()
    {
        return $this->hasOne('App\Models\Workorder', 'id', 'worder_id');
    }
}
