<?php

namespace App\Repositories\InfoProducts;

use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

use function Laravel\Prompts\error;

class InfoProductRepository extends BaseRepository implements InfoProductRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Info_product::class;
    }

    public function getInfoProduct()
    {
        return $this->model->get();
    }

    public function updateInfoProduct($address, $hotline, $email)
    {
        if ($this->model->count() == 1) {
            $infoProduct = $this->model->all()->first()->update([
                'address' => trim($address),
                'hotline' => trim($hotline),
                'email' => trim($email),
            ]);
        } else if ($this->model->count()  == 0) {
            $infoProduct = $this->model->create([
                'address' => trim($address),
                'hotline' => trim($hotline),
                'email' => trim($email),
            ]);
        } else {
            return error('error');
        }

        return $infoProduct;
    }
}
