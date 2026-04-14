<?php


namespace App\Services;

use App\Models\Bando;
class BandoService
{
    public function store(array $data)
    {
        $hash = md5($data['link']);

        return Bando::updateOrCreate(
            ['hash' => $hash],
            [
                'titolo' => $data['titolo'],
                'link' => $data['link'],
                'ente' => $data['ente'],
                'data_pubblicazione' => $data['data_pubblicazione'],
            ]
        );
    }
}