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

    public function updateFooter($company_name, $address, $hotline, $email)
    {
        if ($this->model->count() == 1) {
            $footer = $this->model->all()->first()->update([
                'company_name' => trim($company_name),
                'address' => trim($address),
                'hotline' => trim($hotline),
                'email' => trim($email),
            ]);
        } else if ($this->model->count()  == 0) {
            $footer = $this->model->create([
                'company_name' => trim($company_name),
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
