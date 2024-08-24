<?php

namespace App\Repositories\Years;

use App\Repositories\BaseRepository;

class YearRepository extends BaseRepository implements YearRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Year::class;
    }
}
