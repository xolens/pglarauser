<?php

namespace Xolens\PgLarauser\App\Model;

use Illuminate\Database\Eloquent\Model;

use PgLarauserCreateProfilesAccessView;
use Xolens\LarauserContract\Model\ProfileAccessViewContract;

class ProfileAccessView extends Model 
{
    public const PROFILE_PROPERTY = 'profile_id';

    protected static $carbonFields = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table;
    
    function __construct() {
        $this->table = PgLarauserCreateProfilesAccessView::table();
        parent::__construct();
    }

    public function profile()
    {
        return $this->belongsTo('PgLarauser\App\Model\Profile','profile_id');
    }

    public function access()
    {
        return $this->belongsTo('PgLarauser\App\Model\Access','access_id');
    }

    
    public function save(array $options = []){
        return false;
    }
    public function update(array $attributes =[], array $options =[]){
        return false;
    }
    
    static function firstOrCreate(array $arr){
        return false;
    }
    
    static function firstOrNew(array $arr){
        return false;
    }
    
    public function delete(){
        return false;
    }
    
    static function destroy($ids){
        return false;
    }
    
    public function restore(){
        return false;
    }
    
    public function forceDelete(){
        return false;
    }
    
    /* We need to disable date mutators, because they brake toArray function on this model */
    public function getDates(){
        return array();
    }

    public function getId(){
        return $this->id;
    }
    
}