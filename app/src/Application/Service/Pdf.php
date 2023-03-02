<?php
declare(strict_types=1);

namespace App\Application\Service;

use Gotenberg\Gotenberg;
use Spiral\Distribution\UriResolverInterface;
use Spiral\Storage\StorageInterface;

class Pdf
{
    private StorageInterface $storage;
    private UriResolverInterface $resolver;

    public function __construct(StorageInterface $storage, UriResolverInterface $resolver)
    {
        $this->storage = $storage;
        $this->resolver = $resolver;
    }

    public function gen(string $url): string
    {
        $request = Gotenberg::chromium(env('PDF_ENDPOINT'))
            ->url($url);

        $filename = Gotenberg::save($request, '/tmp');
        $this->storage->bucket('podlodka')->write($filename, file_get_contents("/tmp/$filename"));
        $url = $this->resolver->resolve($filename, new \DateTime(datetime: '+10 sec'));
        return (string)$url;
    }
}
