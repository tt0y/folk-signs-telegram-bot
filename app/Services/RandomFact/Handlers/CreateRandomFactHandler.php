<?php

declare(strict_types=1);

namespace App\Services\RandomFact\Handlers;

use App\Models\RandomFact;
use App\Services\RandomFact\Repositories\RandomFactRepositoryInterface;
use Carbon\Carbon;

/**
 * Class CreateRandomFactHandler
 * @package App\Services\RandomFact\Handlers
 */
class CreateRandomFactHandler
{
    /**
     * @var RandomFactRepositoryInterface
     */
    private RandomFactRepositoryInterface $randomFactRepository;

    /**
     * CreateRandomFactHandler constructor.
     * @param RandomFactRepositoryInterface $randomFactRepository
     */
    public function __construct(
        RandomFactRepositoryInterface $randomFactRepository
    ) {
        $this->randomFactRepository = $randomFactRepository;
    }

    /**
     * @param array $data
     * @return RandomFact
     */
    public function handle(array $data): RandomFact
    {
        $data['created_at'] = Carbon::create()->subDay();
        $data['description'] = ucfirst($data['description']);

        return $this->randomFactRepository->createFromArray($data);
    }
}
