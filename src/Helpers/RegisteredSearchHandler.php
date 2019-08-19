<?php
declare(strict_types=1);

namespace LoyaltyCorp\Search\Helpers;

use LoyaltyCorp\Search\Interfaces\Helpers\RegisteredSearchHandlerInterface;

class RegisteredSearchHandler implements RegisteredSearchHandlerInterface
{
    /**
     * @var \LoyaltyCorp\Search\Interfaces\SearchHandlerInterface[]
     */
    private $searchHandlers;

    /**
     * RegisteredSearchHandlers constructor.
     *
     * @param \LoyaltyCorp\Search\Interfaces\SearchHandlerInterface[] $searchHandlers
     */
    public function __construct(array $searchHandlers)
    {
        $this->searchHandlers = $searchHandlers;
    }

    /**
     * {@inheritdoc}
     */
    public function getAll(): array
    {
        return $this->searchHandlers;
    }
}
