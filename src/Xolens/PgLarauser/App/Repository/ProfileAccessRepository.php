<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\ProfileAccess;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTableProfileAccess;

class ProfileAccessRepository extends AbstractWritableRepository implements ProfileAccessRepositoryContract
{
    public function model(){
        return ProfileAccess::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $profileId = self::get($data,'profile_id');
        $accessId = self::get($data,'access_id');
        return [
            'id' => ['required',Rule::unique(PgLarauserCreateTableProfileAccess::table())->where(function ($query) use($id, $profileId, $accessId) {
                return $query->where('id','!=', $id)->where('profile_id', $profileId)->where('access_id', $accessId);
            })],
        ];
    }
    //*/
    
}
