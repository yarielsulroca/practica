<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property $id
 * @property $contacto
 * @property $social
 * @property $direccion
 * @property $ciudad
 * @property $nombre_cliente
 * @property $cuit
 * @property $email
 * @property $telefono_cliente
 * @property $telefono_contacto
 * @property $allow
 * @property $created_at
 * @property $updated_at
 *
 * @property Workorder[] $workorders
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Client extends Model
{

    static $rules = [
		'contacto' => 'required',
		'direccion' => 'required',
		'allow' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['contacto','social','direccion','ciudad','nombre_cliente','cuit','email','telefono_cliente','telefono_contacto','allow'];


   // Has many Ordenes de Trabajo
    public function workorders()
    {
        return $this->hasMany('App\Models\Workorder', 'client_id', 'id');
    }


}
