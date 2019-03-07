<?php

namespace Xolens\PgLarauser\App\Model\View;
use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateViewPublicUser;



class PublicUserView extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $hidden = [
        'password',
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct(array $attributes = []) {
        $this->table = PgLarauserCreateViewPublicUser::table();
        parent::__construct($attributes);
    }
}

