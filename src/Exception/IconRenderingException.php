<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Exception;

use Exception;
use Jmf\Twig\Extension\Icon\Entity\Icon;
use Throwable;

class IconRenderingException extends Exception
{
    public function __construct(
        private readonly Icon $icon,
        ?Throwable $previous = null,
    ) {
        parent::__construct(
            message:  sprintf(
                          'Icon with id "%s" could not be rendered.',
                          $this->icon->getId(),
                      ),
            previous: $previous,
        );
    }

    public function getIcon(): Icon
    {
        return $this->icon;
    }
}
