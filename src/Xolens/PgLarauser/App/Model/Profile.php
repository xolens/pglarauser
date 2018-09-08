<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateProfilesTable;
use Xolens\LarauserContract\Model\ProfileContract;

class Profile extends Model 
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateProfilesTable::table();
        parent::__construct($attributes);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'description',
    ];

    
    public function profilesAccessView()
    {
        return $this->hasMany('PgLarauser\App\Model\ProfileAccessView', 'profile_id');
    } 
    
    public function groups()
    {
        return $this->hasMany('PgLarauser\App\Model\Group', 'profile_id');
    } 

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        return $this->name = $name;
    }
}