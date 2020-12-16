<?php
declare(strict_types=1);

namespace App\Services\Superstition\Repositories;

use App\Models\Superstition;

class EloquentSuperstitionRepository implements SuperstitionRepositoryInterface
{
    private array $superstition = [
        'name' => 'Примет на сегодня нет',
        'description' => 'Долгие наблюдения за природой не дали резултатов :('
    ];

    public function find(int $id)
    {
        return Superstition::find($id);
    }

    public function search(array $filters = [])
    {
        $raw = Superstition::where([
            ['day', '=', $filters['day']],
            ['month', '=', $filters['month']],
        ])->get()->toArray();

        if (isset($raw[0]))
        {
            $this->superstition = [
                'name' => $raw[0]['name'],
                'description' => $raw[0]['description'],
                'link' =>  url() . '/' . $filters['day'] . '/' . $filters['month'] . '/' . str_slug($raw[0]['name']),
            ];
        }

        return $this->superstition;
    }


    public function createFromArray(array $data): Superstition
    {
        $superstition = new Superstition();
        $superstition->create($data);

        return $superstition;
    }

    public function updateFromArray(Superstition $superstition, array $data)
    {
        $superstition->update($data);

        return $superstition;
    }
}
