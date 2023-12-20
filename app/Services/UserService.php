<?php

namespace App\Services;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store($data)
    {
        try {
            Db::beginTransaction();
            $data['password'] = Hash::make($data['password']);
            $user = User::firstOrCreate(['email' => $data['email']], $data);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $user;
    }
    public function update($data, $user)
    {
        try {
            Db::beginTransaction();
            $user->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $user->fresh();
    }

}
