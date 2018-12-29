<?php

namespace Xolens\PgLarauser\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateTableGroups;


class Group extends Model
{
    public const PROFILE_PROPERTY = 'profile_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'profile_id', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateTableGroups::table();
        parent::__construct($attributes);
    }

    public function profile(){
        return $this->belongsTo('Xolens\PgLarauser\App\Model\Profile','profile_id');
    } 
}
