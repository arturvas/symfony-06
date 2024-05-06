<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class StringManipulationService
{
    private LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function cleanString(string $text): string
    {
        $this->logger->info('amount received ' . $text);
        $text = str_replace(array("[", "]"), " ", $text);
        $this->logger->info('amount returned ' . $text);
        return $text;

    }
}
