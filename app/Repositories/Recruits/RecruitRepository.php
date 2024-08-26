<?php

namespace App\Repositories\Recruits;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;

class RecruitRepository extends BaseRepository implements RecruitRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Recruit::class;
    }

    public function getPaginatedListRecruitsByParams($params = [], $paginate = 10, $sort = 'asc') {
        $recruits = $this->model->orderBy('created_at', $sort);

        $title_vi = $params['title_vi'] ?? '';
        $title_en = $params['title_en'] ?? '';
        $expired_at = $params['expired_at'] ?? '';
        $year = $params['year'] ?? '';

        if ($title_vi != '') {
            $recruits->whereLike('title_vi', '%'.$title_vi.'%');
        }

        if ($title_en != '') {
            $recruits->whereLike('title_en', '%'.$title_en.'%');
        }

        if ($expired_at != '') {
            $recruits->whereDate('expired_at', '>=', $expired_at);
        }

        if ($year != '') {
            $recruits->whereYear('created_at', $year);
        }

        return $recruits->paginate($paginate);
    }

    public function getPaginatedRecruits($paginate = 10)
    {
        return $this->model->paginate($paginate);
    }

    public function getRecruitBySlug($slug)
    {
        return $this->model->where('slug', $slug)->get()->first();
    }
}
