<?php

namespace Xolens\PgLarauser\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateTableProfileAccess;


class ProfileAccess extends Model
{
    public const PROFILE_PROPERTY = 'profile_id';
    public const ACCESS_PROPERTY = 'access_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'profile_id', 'access_id', 'can_read', 'can_update', 'can_delete', 'can_trash', 'can_restore', 'can_import', 'can_export', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateTableProfileAccess::table();
        parent::__construct($attributes);
    }

    public function profile(){
        return $this->belongsTo('Xolens\PgLarauser\App\Model\Profile','profile_id');
    } 

    public function access(){
        return $this->belongsTo('Xolens\PgLarauser\App\Model\Access','access_id');
    } 
}
