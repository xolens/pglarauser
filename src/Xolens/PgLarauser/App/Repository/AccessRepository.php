<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\Access;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTableAccess;

class AccessRepository extends AbstractWritableRepository implements AccessRepositoryContract
{
    public function model(){
        return Access::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLarauserCreateTableAccess::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
            'code' => [Rule::unique(PgLarauserCreateTableAccess::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
