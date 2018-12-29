<?php

namespace Xolens\PgLarauser\App\Repository;

use Xolens\PgLarauser\App\Model\PasswordReset;
use Xolens\LarauserContract\App\Contract\Repository\PasswordResetRepositoryContract;
use Xolens\PgLarautil\App\Repository\AbstractWritableRepository;
use Illuminate\Validation\Rule;
use PgLarauserCreateTablePasswordResets;

class PasswordResetRepository extends AbstractWritableRepository implements PasswordResetRepositoryContract
{
    public function model(){
        return PasswordReset::class;
    }
    /*
    public function validationRules(array $data){
        $id = self::get($data,'id');
        return [
            'id' => ['required',Rule::unique(PgLarauserCreateTablePasswordResets::table())->where(function ($query) use($id) {
                return $query->where('id','!=', $id);
            })],
        ];
    }
    //*/
    
}
