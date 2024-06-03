<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Operation
 *
 * @property $id
 * @property $description
 * @property $name
 * @property $about
 * @property $date_int
 * @property $date_out
 * @property $worker_id
 * @property $labour_id
 * @property $component_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Component $component
 * @property Labour $labour
 * @property Worker $worker
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Operation extends Model
{

    static $rules = [
		'name' => 'required',
		'worker_id' => 'required',
		'labour_id' => 'required',
		'component_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description','name','about','date_int','date_out','worker_id','labour_id','component_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function component()
    {
        return $this->hasOne('App\Models\Component', 'id', 'component_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function labour()
    {
        return $this->belongsTo('App\Models\Labour', 'id', 'labour_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function worker()
    {
        return $this->belongsTo('App\Models\Worker', 'id', 'worker_id');
    }


}
