<?php

declare(strict_types=1);

namespace App\Api\Cli\Command;

use Spiral\Console\Command;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;

/**
 * To execute this command run:
 * php app.php mail Name
 *
 * Run `php app.php help mail` to see all available options.
 */
final class Mail extends Command
{
    protected const SIGNATURE = <<<CMD
        mail
        {name : Podlodka mail task}
        CMD;

    protected const DESCRIPTION = 'The command sends emails.';

    public function __invoke(MailerInterface $mailer): int
    {
        $mailer->send(new Message(
            'template.dark.php',
            'test@gmail.com',
            [
                'name' => $this->argument('name'),
            ]
        ));
        $this->writeln("https://mail.podlodka.localhost");

        return self::SUCCESS;
    }
}
