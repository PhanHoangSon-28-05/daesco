<?php

namespace App\Repositories\Footers;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class FooterRepository extends BaseRepository implements FooterRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Footer::class;
    }

    public function getFooter()
    {
        return $this->model->get();
    }

    public function updateFooter($address, $hotline, $email)
    {
        if ($this->model->count() == 1) {
            $footer = $this->model->all()->first()->update([
                'address' => trim($address),
                'hotline' => trim($hotline),
                'email' => trim($email),
            ]);
        } else if ($this->model->count()  == 0) {
            $footer = $this->model->create([
                'address' => trim($address),
                'hotline' => trim($hotline),
                'email' => trim($email),
            ]);
        } else {
            return error('error');
        }

        return $footer;
    }
}
