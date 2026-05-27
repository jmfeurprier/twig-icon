<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Entity;

readonly class Icon
{
    public function __construct(
        private string $id,
        private string $class,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getClass(): string
    {
        return $this->class;
    }
}
