<?php

declare(strict_types=1);

namespace App\Api\Cli\Command;

use Spiral\Console\Command;
use App\Application\Service\Pdf as PdfService;

/**
 * To execute this command run:
 * php app.php mail Name
 *
 * Run `php app.php help mail` to see all available options.
 */
final class Pdf extends Command
{
    protected const SIGNATURE = <<<CMD
        pdf
        {url : Url to make pdf of}
        CMD;

    protected const DESCRIPTION = 'The command generates PDF file.';

    public function __invoke(PdfService $pdf): int
    {
        $this->writeln($pdf->gen($this->argument('url')));
        return self::SUCCESS;
    }
}
