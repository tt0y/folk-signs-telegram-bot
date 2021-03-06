<?php
declare(strict_types=1);

namespace App\Services\Superstition\Repositories;

use App\Models\Superstition;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class EloquentSuperstitionRepository implements SuperstitionRepositoryInterface
{
    private array $superstition = [
        'name' => 'Примет на сегодня нет',
        'description' => 'Долгие наблюдения за природой не дали результатов :('
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
            (!empty($raw[0]['description']))
                ? $link = URL::to('/') . '/' . $filters['day'] . '/' . $filters['month'] . '/' . Str::slug($raw[0]['name'])
                : $link = '';

            $this->superstition = [
                'name' => $raw[0]['name'],
                'description' => $raw[0]['description'],
                'link' => $link,
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
