<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateAccessTable;
use PgLarauserCreateProfilesAccessTable;
use Xolens\LarauserContract\Model\AccessContract;


class Access extends Model 
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','code', 'description', 'readable', 'updatable', 'deletable', 'trashable', 'restorable', 'importable', 'exportable',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateAccessTable::table();
        parent::__construct($attributes);
    }

    public function profiles()
    {
        return $this->belongsToMany('PgLarauser\App\Model\Profile',PgLarauserCreateProfilesAccessTable::table(),'access_id','profile_id');
    } 

    public function getId(){
        return $this->id;
    }
    
    public function setCode($code){
        $this->code = $code;
    }

}