<?php

namespace App\Repositories;

use App\Models\Record;
use Illuminate\Database\Eloquent\Model;

class RecordRepository implements Repository
{
    private Record $record;

    public function __construct(Record $record)
    {
        $this->record = $record;
    }

    public function create(array $data): Model
    {
        // Hard-coding shop_id as it is out of scope
        $data = array_merge(['shop_id' => 1], $data);

        return $this->record->query()->create($data);
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
        return $this->record->search($keyword)->orderBy('title', 'asc')->get();
    }
}
