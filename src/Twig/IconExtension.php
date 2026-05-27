<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Twig;

use Jmf\Twig\Extension\Icon\Exception\IconNotFoundException;
use Jmf\Twig\Extension\Icon\Exception\IconRenderingException;
use Jmf\Twig\Extension\Icon\Rendering\IconRendererInterface;
use Jmf\Twig\Extension\Icon\Repository\IconRepositoryInterface;
use Override;
use Twig\Error\LoaderError;
use Twig\Extension\AbstractExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFunction;

class IconExtension extends AbstractExtension
{
    public const string PREFIX_DEFAULT = '';

    /**
     * @throws LoaderError
     */
    public function __construct(
        private readonly IconRepositoryInterface $iconRepository,
        private readonly IconRendererInterface $iconRenderer,
        FilesystemLoader $filesystemLoader,
        private readonly string $functionPrefix = self::PREFIX_DEFAULT,
    ) {
        $filesystemLoader->addPath(__DIR__ . '/../../templates', 'JmfIcon');
    }

    #[Override]
    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                "{$this->functionPrefix}icon",
                $this->icon(...),
                [
                    'is_safe' => ['html'],
                ],
            ),
        ];
    }

    /**
     * @throws IconNotFoundException
     * @throws IconRenderingException
     */
    private function icon(string $iconId): string
    {
        $icon = $this->iconRepository->get($iconId);

        return $this->iconRenderer->render($icon);
    }
}
