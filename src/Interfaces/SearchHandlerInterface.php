<?php
declare(strict_types=1);

namespace LoyaltyCorp\Search\Interfaces;

interface SearchHandlerInterface
{
    /**
     * Returns the index name that this handler is responsible for.
     *
     * @return string
     */
    public function getIndexName(): string;

    /**
     * Returns Elasticsearch mappings for index creation.
     *
     * @return mixed[]
     */
    public static function getMappings(): array;

    /**
     * Returns Elasticsearch settings for index creation.
     *
     * @return mixed[]
     */
    public static function getSettings(): array;
}
