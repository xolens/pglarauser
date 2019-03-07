<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\User;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTableUsers;

class UserRepository extends AbstractWritableRepository implements UserRepositoryContract
{
    public function model(){
        return User::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $groupId = self::get($data,'group_id');
        return [
            'id' => ['required',Rule::unique(PgLarauserCreateTableUsers::table())->where(function ($query) use($id, $groupId) {
                return $query->where('id','!=', $id)->where('group_id', $groupId);
            })],
            'email' => [Rule::unique(PgLarauserCreateTableUsers::table())->where(function ($query) use($id, $groupId) {
                return $query->where('id','!=', $id)->where('group_id', $groupId);
            })],
        ];
    }
    //*/
    
}
