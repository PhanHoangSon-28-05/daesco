<?php

namespace App\Repositories\Recruits;

use App\Repositories\RepositoryInterface;

interface RecruitRepositoryInterface extends RepositoryInterface
{
    public function getPaginatedListRecruitsByParams($params, $paginate, $sort);
    public function getPaginatedRecruits($paginate);
    public function getRecruitBySlug($slug);
}
