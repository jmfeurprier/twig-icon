<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Rendering;

use Jmf\Twig\Extension\Icon\Entity\Icon;
use Jmf\Twig\Extension\Icon\Exception\IconRenderingException;

interface IconRendererInterface
{
    /**
     * @throws IconRenderingException
     */
    public function render(Icon $icon): string;
}
