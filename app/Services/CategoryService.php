<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryService
{

    public function store($data)
    {
        try {
            Db::beginTransaction();
            $category = Category::firstOrCreate($data);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $category;
    }
    public function update($data, $category)
    {
        try {
            Db::beginTransaction();
            $category->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $category->fresh();
    }

}
