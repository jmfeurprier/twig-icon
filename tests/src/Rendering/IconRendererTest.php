<?php

declare(strict_types=1);

namespace Jmf\Twig\Extension\Icon\Test\Rendering;

use Exception;
use Jmf\TemplateRendering\TemplateRendererInterface;
use Jmf\Twig\Extension\Icon\Entity\Icon;
use Jmf\Twig\Extension\Icon\Exception\IconRenderingException;
use Jmf\Twig\Extension\Icon\Rendering\IconRenderer;
use Override;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\TestCase;

final class IconRendererTest extends TestCase
{
    private TemplateRendererInterface & Stub $templateRenderer;

    private Icon $icon;

    private IconRenderer $iconRenderer;

    #[Override]
    protected function setUp(): void
    {
        $this->templateRenderer = $this->createStub(TemplateRendererInterface::class);
        $this->icon             = $this->createStub(Icon::class);

        $this->iconRenderer = new IconRenderer($this->templateRenderer);
    }

    public function testRenderReturnsRenderedHtml(): void
    {
        $this->templateRenderer
            ->method('renderFromFile')
            ->willReturn('<span>search_icon</span>')
        ;

        $this->assertSame('<span>search_icon</span>', $this->iconRenderer->render($this->icon));
    }

    public function testRenderPassesIconToTemplate(): void
    {
        $templateRenderer = $this->createMock(TemplateRendererInterface::class);
        $templateRenderer
            ->expects($this->once())
            ->method('renderFromFile')
            ->with(
                $this->anything(),
                ['icon' => $this->icon],
            )
            ->willReturn('')
        ;

        (new IconRenderer($templateRenderer))->render($this->icon);
    }

    public function testRenderThrowsIconRenderingExceptionOnFailure(): void
    {
        $this->templateRenderer
            ->method('renderFromFile')
            ->willThrowException(new Exception('render failure'))
        ;

        $this->expectException(IconRenderingException::class);

        $this->iconRenderer->render($this->icon);
    }
}
