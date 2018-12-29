<?php

namespace Xolens\PgLarauser\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateTableLoginHistorys;


class LoginHistory extends Model
{
    public const USER_PROPERTY = 'user_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'client_ip', 'connexion_at', 'http_user_agent', 'type', 'user_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateTableLoginHistorys::table();
        parent::__construct($attributes);
    }

    public function user(){
        return $this->belongsTo('Xolens\PgLarauser\App\Model\User','user_id');
    } 
}
