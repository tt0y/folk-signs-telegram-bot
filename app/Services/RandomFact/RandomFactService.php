<?php
declare(strict_types=1);

namespace App\Services\RandomFact;

use App\Models\RandomFact;
use App\Services\RandomFact\Handlers\CreateRandomFactHandler;
use App\Services\RandomFact\Repositories\RandomFactRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class RandomFactService
 * @package App\Services\RandomFact
 */
class RandomFactService
{
    /**
     * @var RandomFactRepositoryInterface
     */
    private RandomFactRepositoryInterface $randomFactRepository;
    /**
     * @var CreateRandomFactHandler
     */
    private CreateRandomFactHandler $createRandomFactHandler;

    /**
     * RandomFactService constructor.
     * @param CreateRandomFactHandler $createRandomFactHandler
     * @param RandomFactRepositoryInterface $randomFactRepository
     */
    public function __construct(
        CreateRandomFactHandler $createRandomFactHandler,
        RandomFactRepositoryInterface $randomFactRepository
    )
    {
        $this->createRandomFactHandler = $createRandomFactHandler;
        $this->randomFactRepository = $randomFactRepository;
    }

    /**
     * @param array $filters
     * @return array
     */
    public function getRandomFact(): array
    {
        return $this->randomFactRepository->getRandomFact();
    }

    /**
     * @param array $data
     * @return RandomFact
     */
    public function storeRandomFact(array $data): RandomFact
    {
        return $this->createRandomFactHandler->handle($data);
    }

    /**
     * @param RandomFact $randomFact
     * @param array $data
     * @return RandomFact
     */
    public function updateRandomFact(RandomFact $randomFact, array $data): RandomFact
    {
        return $this->randomFactRepository->updateFromArray($randomFact, $data);
    }
}
