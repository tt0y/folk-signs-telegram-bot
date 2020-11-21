<?php
declare(strict_types=1);

namespace App\Services\Superstition;

use App\Models\Superstition;
use App\Services\Superstition\Handlers\CreateSuperstitionHandler;
use App\Services\Superstition\Repositories\SuperstitionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class SuperstitionService
 * @package App\Services\Superstition
 */
class SuperstitionService
{
    /**
     * @var SuperstitionRepositoryInterface
     */
    private SuperstitionRepositoryInterface $superstitionRepository;
    /**
     * @var CreateSuperstitionHandler
     */
    private CreateSuperstitionHandler $createSuperstitionHandler;

    /**
     * SuperstitionService constructor.
     * @param CreateSuperstitionHandler $createSuperstitionHandler
     * @param SuperstitionRepositoryInterface $superstitionRepository
     */
    public function __construct(
        CreateSuperstitionHandler $createSuperstitionHandler,
        SuperstitionRepositoryInterface $superstitionRepository
    )
    {
        $this->createSuperstitionHandler = $createSuperstitionHandler;
        $this->superstitionRepository = $superstitionRepository;
    }

    /**
     * @param array $filters
     * @return array
     */
    public function searchSuperstitions(array $filters = []): array
    {
        return $this->superstitionRepository->search($filters);
    }

    /**
     * @param array $data
     * @return Superstition
     */
    public function storeSuperstition(array $data): Superstition
    {
        return $this->createSuperstitionHandler->handle($data);
    }

    /**
     * @param Superstition $superstition
     * @param array $data
     * @return Superstition
     */
    public function updateSuperstition(Superstition $superstition, array $data): Superstition
    {
        return $this->superstitionRepository->updateFromArray($superstition, $data);
    }
}
