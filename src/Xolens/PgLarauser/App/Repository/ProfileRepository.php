<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\Profile;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTableProfiles;

class ProfileRepository extends AbstractWritableRepository implements ProfileRepositoryContract
{
    public function model(){
        return Profile::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLarauserCreateTableProfiles::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
            'name' => [Rule::unique(PgLarauserCreateTableProfiles::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
