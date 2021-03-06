<?php
declare(strict_types=1);

namespace Tests\LoyaltyCorp\Search\Unit\Bridge\Symfony\MessageHandlers;

use EonX\EasyEntityChange\DataTransferObjects\UpdatedEntity;
use EonX\EasyEntityChange\Events\EntityChangeEvent;
use LoyaltyCorp\Search\Bridge\Symfony\MessageHandlers\EntityUpdateHandler;
use stdClass;
use Tests\LoyaltyCorp\Search\Stubs\Workers\EntityUpdateWorkerStub;
use Tests\LoyaltyCorp\Search\TestCases\UnitTestCase;

/**
 * @covers \LoyaltyCorp\Search\Bridge\Symfony\MessageHandlers\EntityUpdateHandler
 */
final class EntityUpdateHandlerTest extends UnitTestCase
{
    /**
     * Tests that the listener calls the worker with changes..
     *
     * @return void
     */
    public function testHandle(): void
    {
        $worker = new EntityUpdateWorkerStub();
        $listener = new EntityUpdateHandler($worker);

        $updatedEntity = new UpdatedEntity(
            ['property'],
            stdClass::class,
            ['id' => 'value']
        );

        $expectedCalls = [
            ['changes' => [$updatedEntity]],
        ];

        $listener(new EntityChangeEvent([
            $updatedEntity,
        ]));

        self::assertSame($expectedCalls, $worker->getCalls('handle'));
    }
}
