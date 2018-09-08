<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateGroupsTable;
use Xolens\LarauserContract\Model\GroupContract;

class Group extends Model 
{

    public const PROFILE_PROPERTY = 'profile_id';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateGroupsTable::table();
        parent::__construct($attributes);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'description', 'profile_id',
    ];

    public function profile()
    {
        return $this->belongsTo('PgLarauser\App\Model\Profile','profile_id');
    } 

    public function users()
    {
        return $this->hasMany('PgLarauser\App\Model\User', 'group_id');
    } 

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }

}