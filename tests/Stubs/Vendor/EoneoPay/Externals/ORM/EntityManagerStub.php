<?php
declare(strict_types=1);

namespace Tests\LoyaltyCorp\Search\Stubs\Vendor\EoneoPay\Externals\ORM;

use EoneoPay\Externals\ORM\Interfaces\EntityInterface;
use EoneoPay\Externals\ORM\Interfaces\EntityManagerInterface;
use EoneoPay\Externals\ORM\Interfaces\Query\FilterCollectionInterface;
use EoneoPay\Externals\ORM\Interfaces\RepositoryInterface;
use Tests\LoyaltyCorp\Search\Stubs\Vendor\EoneoPay\Externals\ORM\Query\FilterCollectionStub;

/**
 * @coversNothing
 */
final class EntityManagerStub implements EntityManagerInterface
{
    /**
     * Entities.
     *
     * @var \EoneoPay\Externals\ORM\Interfaces\EntityInterface[]|null
     */
    private $entities;

    /**
     * What is returned by findByIds.
     *
     * @var object[][]
     */
    private $findByIds = [];

    /**
     * EntityManagerStub constructor.
     *
     * @param \EoneoPay\Externals\ORM\Interfaces\EntityInterface[]|null $entities
     */
    public function __construct(?array $entities = null)
    {
        $this->entities = $entities;
    }

    /**
     * Adds a findByIds return.
     *
     * @param object[] $findByIds
     *
     * @return void
     */
    public function addFindByIds(array $findByIds): void
    {
        $this->findByIds[] = $findByIds;
    }

    /**
     * {@inheritdoc}
     */
    public function findByIds(string $class, array $ids): array
    {
        return \array_shift($this->findByIds) ?? [];
    }

    /**
     * {@inheritdoc}
     */
    public function flush(): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters(): FilterCollectionInterface
    {
        return new FilterCollectionStub();
    }

    /**
     * {@inheritdoc}
     */
    public function getRepository(string $class): RepositoryInterface
    {
        return new RepositoryStub($this->entities);
    }

    /**
     * {@inheritdoc}
     *
     * @return void
     */
    public function merge(EntityInterface $entity): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function persist(EntityInterface $entity): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function remove(EntityInterface $entity): void
    {
    }
}
