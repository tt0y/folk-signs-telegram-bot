<?php
declare(strict_types=1);

namespace App\Services\RandomFact\Repositories;

use App\Models\RandomFact;

interface RandomFactRepositoryInterface
{
    public function find(int $id);

    public function getRandomFact();

    public function createFromArray(array $data): RandomFact;

    public function updateFromArray(RandomFact $randomFact, array $data);
}
