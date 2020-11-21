<?php
declare(strict_types=1);

namespace App\Services\Superstition\Repositories;

use App\Models\Superstition;

interface SuperstitionRepositoryInterface
{
    public function find(int $id);

    public function search(array $filters = []);

    public function createFromArray(array $data): Superstition;

    public function updateFromArray(Superstition $superstition, array $data);
}
