<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Exception;

use Exception;

class IconNotFoundException extends Exception
{
    public function __construct(
        private readonly string $iconId,
    ) {
        parent::__construct(
            sprintf(
                'Icon with id "%s" not found.',
                $this->iconId,
            ),
        );
    }

    public function getIconId(): string
    {
        return $this->iconId;
    }
}
