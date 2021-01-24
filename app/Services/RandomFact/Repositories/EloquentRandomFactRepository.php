<?php
declare(strict_types=1);

namespace App\Services\RandomFact\Repositories;

use App\Models\RandomFact;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class EloquentRandomFactRepository implements RandomFactRepositoryInterface
{

    public function find(int $id)
    {
        return RandomFact::find($id);
    }

    public function getRandomFact()
    {
        return RandomFact::inRandomOrder()->first()->toArray();
    }


    public function createFromArray(array $data): RandomFact
    {
        $randomFact = new RandomFact();
        $randomFact->create($data);

        return $randomFact;
    }

    public function updateFromArray(RandomFact $randomFact, array $data)
    {
        $randomFact->update($data);

        return $randomFact;
    }
}
