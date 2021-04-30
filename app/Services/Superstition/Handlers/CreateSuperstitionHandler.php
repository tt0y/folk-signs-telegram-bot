<?php

declare(strict_types=1);

namespace App\Services\Superstition\Handlers;

use App\Models\Superstition;
use App\Services\Superstition\Repositories\SuperstitionRepositoryInterface;
use Carbon\Carbon;

/**
 * Class CreateSuperstitionHandler
 * @package App\Services\Superstition\Handlers
 */
class CreateSuperstitionHandler
{
    /**
     * @var SuperstitionRepositoryInterface
     */
    private SuperstitionRepositoryInterface $superstitionRepository;

    /**
     * CreateSuperstitionHandler constructor.
     * @param SuperstitionRepositoryInterface $superstitionRepository
     */
    public function __construct(
        SuperstitionRepositoryInterface $superstitionRepository
    ) {
        $this->superstitionRepository = $superstitionRepository;
    }

    /**
     * @param array $data
     * @return Superstition
     */
    public function handle(array $data): Superstition
    {
        $data['created_at'] = Carbon::create()->subDay();
        $data['name'] = ucfirst($data['name']);

        return $this->superstitionRepository->createFromArray($data);
    }
}
