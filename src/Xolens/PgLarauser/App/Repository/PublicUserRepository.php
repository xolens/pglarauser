<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\PublicUser;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTablePublicUsers;

class PublicUserRepository extends AbstractWritableRepository implements PublicUserRepositoryContract
{
    public function model(){
        return PublicUser::class;
    }
    
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'email' => [Rule::unique(PgLarauserCreateTablePublicUsers::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
