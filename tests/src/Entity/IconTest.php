<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Test\Entity;

use Jmf\Twig\Extension\Icon\Entity\Icon;
use PHPUnit\Framework\TestCase;

final class IconTest extends TestCase
{
    public function testGetIdReturnsId(): void
    {
        $icon = new Icon('search', 'search_icon');

        $this->assertSame('search', $icon->getId());
    }

    public function testGetClassReturnsClass(): void
    {
        $icon = new Icon('search', 'search_icon');

        $this->assertSame('search_icon', $icon->getClass());
    }
}
