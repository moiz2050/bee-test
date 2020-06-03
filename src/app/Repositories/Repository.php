<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function create(array $data);

    public function update(Model $model, array $data);

    public function delete(Model $model);
}
