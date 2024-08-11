<?php

namespace App\Repositories\Headers;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class HeaderRepository extends BaseRepository implements HeaderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Header::class;
    }

    public function getHeader()
    {
        return $this->model->get();
    }

    public function updateHeader($hotline, $email, $facebook, $instagram, $youtube, $linkedin)
    {
        if ($this->model->count() == 1) {
            $Header = $this->model->all()->first()->update([
                'hotline' => trim($hotline),
                'email' => trim($email),
                'facebook' => trim($facebook),
                'instagram' => trim($instagram),
                'youtube' => trim($youtube),
                'linkedin' => trim($linkedin),
            ]);
        } else if ($this->model->count()  == 0) {
            $Header = $this->model->create([
                'hotline' => trim($hotline),
                'email' => trim($email),
                'facebook' => trim($facebook),
                'instagram' => trim($instagram),
                'youtube' => trim($youtube),
                'linkedin' => trim($linkedin),
            ]);
        } else {
            return error('error');
        }

        return $Header;
    }
}
