<?php

declare(strict_types=1);

namespace App\Services;

final class ParserService
{
    /**
     * @param array<mixed> $options
     */
    public function __construct(private readonly string $markdown, private readonly array $options=[])
    {}

    private function splitText(): array
    {
        return preg_split("/\r\n|\n|\r/", $this->markdown);
    }

    public function html(): string
    {
        $html = '';

        foreach ($this->splitText() as $line) {
            if ($line !== '') {
                $html .= (new ParserLineService($line))->translate();
            }
        }

        return $html;
    }
}
