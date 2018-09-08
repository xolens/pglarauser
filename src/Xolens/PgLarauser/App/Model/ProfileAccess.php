<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateProfilesAccessTable;
use Xolens\LarauserContract\Model\ProfileAccessContract;

class ProfileAccess extends Model 
{
    public const PROFILE_PROPERTY = 'profile_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'profile_id', 'access_id', 'can_read' ,'can_update' ,'can_delete' ,'can_trash' ,'can_restore' ,'can_import' ,'can_export' ,
    ];
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateProfilesAccessTable::table();
        parent::__construct($attributes);
    }

    public function profile()
    {
        return $this->belongsTo('PgLarauser\App\Model\Profile','profile_id');
    }

    public function access()
    {
        return $this->belongsTo('PgLarauser\App\Model\Access','access_id');
    }

    public function getId(){
        return $this->id;
    }

    public function getCanAccess(){
        return $this->can_access;
    }
    
    public function setCanAccess($canAccess){
        $this->can_access = $canAccess;
    }

}