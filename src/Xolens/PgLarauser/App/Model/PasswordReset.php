<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarauserCreatePasswordResetsTable;
use Xolens\LarauserContract\Model\PasswordResetContract;

class PasswordReset extends Model 
{

    public const EXPIRE_AT_PROPERTY = 'expire_at';
    public const USER_PROPERTY = 'user_id';
    public const RESET_PASSWORD_TIMEOUT = 30;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','email', 'secret','expire_at','success','user_id',
    ];

        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreatePasswordResetsTable::table();
        parent::__construct($attributes);
    }

    /**
     * Boot function for using with User Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model)
        {
            $model->generateExpireAt();
        });
    }

    public function user()
    {
        return $this->belongsTo('PgLarauser\App\Model\User','user_id');
    }

    public function getId(){
        return $this->id;
    } 

    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setSecret($secret){
        $this->secret = $secret;
    }

    public function setExpireAt($expireDate){
        $this->expire_at = $expireDate;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSecret(){
        return $this->secrett;
    }

    public function generateExpireAt(){
        if($this->expire_at == null){
            $timeOut =  intval(config('xolens-config.pglarauser-password_reset_timeout_minutes'));
            $timeOut = $timeOut==0?self::RESET_PASSWORD_TIMEOUT:$timeOut;
            $this->expire_at = \Carbon\Carbon::now()->addMinutes($timeOut);
        }
        return $this->expire_at;
    }

   
    /*public static function create(array $attributes)
    {
        return parent::create($attributes);
    }  //*/

    
}