<?php

declare(strict_types=1);

namespace App\Services;

final class ParserLineService
{
    /**
     * @param array<mixed> $options
     */
    public function __construct(private readonly string $markdownLine, private readonly array $options=[])
    {}

    private function splitLine(): array
    {
        return explode('#', $this->markdownLine);
    }

    public function translate(): string
    {
        $cuttedLine = $this->markdownLine;

        $htmlLine = '';

        if ($cuttedLine[0] === '#') {
            return $htmlLine .= '<h1>' . $cuttedLine . '</h1>';
        }

        return $htmlLine .= '<p>' . $cuttedLine . '</p>';
    }
}
