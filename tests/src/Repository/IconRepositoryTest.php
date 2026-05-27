<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Test\Repository;

use InvalidArgumentException;
use Jmf\Twig\Extension\Icon\Exception\IconNotFoundException;
use Jmf\Twig\Extension\Icon\Repository\IconRepository;
use PHPUnit\Framework\TestCase;

final class IconRepositoryTest extends TestCase
{
    public function testGetReturnsIconWithCorrectId(): void
    {
        $iconRepository = new IconRepository(
            [
                'search' => 'search_icon',
                'delete' => 'delete_icon',
            ],
        );

        $icon = $iconRepository->get('search');

        self::assertSame('search', $icon->getId());
    }

    public function testGetReturnsIconWithCorrectClass(): void
    {
        $iconRepository = new IconRepository(
            [
                'search' => 'search_icon',
                'delete' => 'delete_icon',
            ],
        );

        $icon = $iconRepository->get('search');

        self::assertSame('search_icon', $icon->getClass());
    }

    public function testGetThrowsIconNotFoundExceptionForUnknownId(): void
    {
        $iconRepository = new IconRepository(
            [
                'search' => 'search_icon',
                'delete' => 'delete_icon',
            ],
        );

        $this->expectException(IconNotFoundException::class);

        $iconRepository->get('unknown');
    }

    public function testConstructorRejectsNonStringValues(): void
    {
        $this->expectException(InvalidArgumentException::class);

        // @phpstan-ignore argument.type
        new IconRepository(['search' => 42]);
    }

    public function testConstructorRejectsNonMapArray(): void
    {
        $this->expectException(InvalidArgumentException::class);

        // @phpstan-ignore argument.type
        new IconRepository(['search_icon']);
    }
}
