<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PgLarauserCreateUsersTable;
use Xolens\LarauserContract\Model\UserContract;

class User extends Authenticatable 
{
    use Notifiable;

    public const GROUP_PROPERTY = 'group_id';
    public const EMAIL_PROPERTY = 'email';
    public const PASSWORD_PROPERTY = 'password';
    public const STATE_PROPERTY = 'state';
    
    public const STATE_PENDING = 'PENDING';
    public const STATE_VALID = 'VALID';
    public const STATE_INVALID = 'INVALID';
    public const STATE_RECOVERING = 'RECOVERING';
    
    public const ACCOUNT_STATES = PgLarauserCreateUsersTable::ACCOUNT_STATES;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password','state','group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateUsersTable::table();
        parent::__construct($attributes);
    }

    public function group()
    {
        return $this->belongsTo('PgLarauser\App\Model\Group','group_id');
    } 
    
    public function passwordResets()
    {
        return $this->hasMany('PgLarauser\App\Model\PasswordReset', 'user_id');
    } 
    
    public function loginsHistory()
    {
        return $this->hasMany('PgLarauser\App\Model\LoginHistory', 'user_id');
    } 

    public function getId(){
        return $this->id;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }
    
    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }
    
    public function setState($state){
        $this->state = $state;
    }

    public function getState(){
        return $this->state;
    }

}