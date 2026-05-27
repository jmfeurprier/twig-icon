<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Rendering;

use Jmf\TemplateRendering\TemplateRendererInterface;
use Jmf\Twig\Extension\Icon\Entity\Icon;
use Jmf\Twig\Extension\Icon\Exception\IconRenderingException;
use Override;
use Throwable;

readonly class IconRenderer implements IconRendererInterface
{
    public function __construct(
        private TemplateRendererInterface $templateRenderer,
        private string $templatePath = '@JmfIcon/material/icon.html.twig',
    ) {
    }

    #[Override]
    public function render(Icon $icon): string
    {
        try {
            return $this->templateRenderer->renderFromFile(
                $this->templatePath,
                [
                    'icon' => $icon,
                ],
            );
        } catch (Throwable $e) {
            throw new IconRenderingException($icon, $e);
        }
    }
}
