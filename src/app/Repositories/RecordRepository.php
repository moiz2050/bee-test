<?php

namespace App\Repositories;

use App\Models\Record;

class RecordRepository implements Repository
{
    public function create(array $data)
    {
        // Hardcoding shop_id as it is out of scope
        $data = array_merge(['shop_id' => 1], $data);

        return Record::query()->create($data);
    }
}
