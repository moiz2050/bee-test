<?php

namespace App\Repositories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Model;

class RecordRepository implements Repository
{
    public function create(array $data): Model
    {
        // Hard-coding shop_id as it is out of scope
        $data = array_merge(['shop_id' => 1], $data);

        return Record::query()->create($data);
    }

    public function update(Model $record, array $data): Model
    {
        $record->update($data);

        return $record;
    }

    public function delete(Model $record)
    {
        $record->delete();

        return null;
    }

    public function search(string $keyword)
    {
        return Record::search($keyword)->orderBy('title', 'asc')->get();
    }
}
