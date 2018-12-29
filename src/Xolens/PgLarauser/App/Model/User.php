<?php

namespace Xolens\PgLarauser\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateTableUsers;


class User extends Model
{
    public const GROUP_PROPERTY = 'group_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'state', 'group_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateTableUsers::table();
        parent::__construct($attributes);
    }

    public function group(){
        return $this->belongsTo('Xolens\PgLarauser\App\Model\Group','group_id');
    } 
}
