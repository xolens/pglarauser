<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateLoginHistoryTable;
use Xolens\LarauserContract\Model\LoginHistoryContract;

class LoginHistory extends Model 
{
    public const USER_PROPERTY = 'user_id';
    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateLoginHistoryTable::table();
        parent::__construct($attributes);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','client_ip', 'login_at', 'http_user_agent','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('PgLarauser\App\Model\User','user_id');
    } 

    public function getId(){
        return $this->id;
    }
    
    public function getConnexionAt(){
        return $this->login_at;
    }
    
    public function setConnexionAt($date){
        $this->login_at = $date;
    }

}