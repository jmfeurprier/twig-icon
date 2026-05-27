<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Repository;

use Jmf\Twig\Extension\Icon\Entity\Icon;
use Jmf\Twig\Extension\Icon\Exception\IconNotFoundException;
use Override;
use Webmozart\Assert\Assert;

readonly class IconRepository implements IconRepositoryInterface
{
    /**
     * @var array<string, string>
     */
    private array $iconMapping;

    /**
     * @param array<string, non-empty-string> $iconMapping
     */
    public function __construct(
        array $iconMapping,
    ) {
        Assert::isMap($iconMapping);
        Assert::allStringNotEmpty($iconMapping);

        $this->iconMapping = $iconMapping;
    }

    #[Override]
    public function get(string $id): Icon
    {
        $iconClass = $this->iconMapping[$id]
            ??
            throw new IconNotFoundException(
                sprintf(
                    "Icon with Id '%s' is not defined.",
                    $id,
                ),
            );

        return new Icon($id, $iconClass);
    }
}
