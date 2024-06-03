<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Waranty
 *
 * @property $id
 * @property $description_items
 * @property $client_id
 * @property $derechos
 * @property $date_end
 * @property $vias_reclamacion
 * @property $worder_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Workorder $workorder
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Waranty extends Model
{

    static $rules = [
		'description_items' => 'required',
		'client_id' => 'required',
		'derechos' => 'required',
		'date_end' => 'required',
		'worder_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description_items',
    'client_id',
    'derechos',
    'date_end',
    'vias_reclamacion',
    'worder_id'
];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function workorder()
    {
        return $this->hasOne('App\Models\Workorder', 'id', 'worder_id');
    }


}
