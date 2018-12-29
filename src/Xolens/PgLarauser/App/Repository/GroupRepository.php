<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\Group;
use Xolens\LarauserContract\App\Contract\Repository\GroupRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTableGroups;

class GroupRepository extends AbstractWritableRepository implements GroupRepositoryContract
{
    public function model(){
        return Group::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $profileId = self::get($data,'profile_id');
        return [
            'id' => ['required',Rule::unique(PgLarauserCreateTableGroups::table())->where(function ($query) use($id, $profileId) {
                return $query->where('id','!=', $id)->where('profile_id', $profileId);
            })],
            'name' => [Rule::unique(PgLarauserCreateTableGroups::table())->where(function ($query) use($id, $profileId) {
                return $query->where('id','!=', $id)->where('profile_id', $profileId);
            })],
        ];
    }
    //*/
    
}
