<?php

namespace Xolens\PgLarauser\App\Model;
use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateTableAccess;


class Access extends Model
{

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'base', 'is_public', 'code', 'readable', 'updatable', 'deletable', 'trashable', 'restorable', 'importable', 'exportable', 
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateTableAccess::table();
        parent::__construct($attributes);
    }
}
