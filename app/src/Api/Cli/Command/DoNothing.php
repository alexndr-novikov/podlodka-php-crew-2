<?php

declare(strict_types=1);

namespace App\Api\Cli\Command;

use Spiral\Console\Command;

/**
 * To execute this command run:
 * php app.php cron-task foo --times=20
 *
 * Run `php app.php help cron` to see all available options.
 */
final class DoNothing extends Command
{
    protected const SIGNATURE = <<<CMD
        cron-task
        {name : Podlodka cron task}
        {--t|times=10 : Number of times to repeat}
        CMD;

    protected const DESCRIPTION = 'The command does almost nothing.';

    public function __invoke(): int
    {
        $this->info(\sprintf('I did %s %s times!', $this->argument('name'), $this->option('times')));

        return self::SUCCESS;
    }
}
