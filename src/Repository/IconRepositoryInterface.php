<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Repository;

use Jmf\Twig\Extension\Icon\Entity\Icon;
use Jmf\Twig\Extension\Icon\Exception\IconNotFoundException;

interface IconRepositoryInterface
{
    /**
     * @throws IconNotFoundException
     */
    public function get(string $id): Icon;
}
