<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagsService
{
    public function store(mixed $data)
    {
        try {
            Db::beginTransaction();
            $tag = Tag::firstOrCreate($data);
            DB::commit();
        }catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $tag;

    }

    public function update(mixed $data, $tag)
    {
        try {
            Db::beginTransaction();
            $tag->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }

        return $tag->fresh();
    }
}
