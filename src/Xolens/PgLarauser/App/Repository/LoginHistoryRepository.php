<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\LoginHistory;
use Xolens\LarauserContract\App\Contract\Repository\LoginHistoryRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTableLoginHistorys;

class LoginHistoryRepository extends AbstractWritableRepository implements LoginHistoryRepositoryContract
{
    public function model(){
        return LoginHistory::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        $userId = self::get($data,'user_id');
        return [
            'id' => ['required',Rule::unique(PgLarauserCreateTableLoginHistorys::table())->where(function ($query) use($id, $userId) {
                return $query->where('id','!=', $id)->where('user_id', $userId);
            })],
        ];
    }
    //*/
    
}
