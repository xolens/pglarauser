<?php

namespace Xolens\PgLarauser\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateTablePublicUsers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PublicUser extends Authenticatable
{
    use Notifiable;
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'category', 'state', 'token'. 'last_request'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateTablePublicUsers::table();
        parent::__construct($attributes);
    }
}
