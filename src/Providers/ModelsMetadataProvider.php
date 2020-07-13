<?php
declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;

class ModelsMetadataProvider implements ServiceProviderInterface
{
    /**
     * @var string $providerName
     */
    protected $providerName = 'modelsMetadata';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        /** @var string $cacheDir */
        $cacheDir = $di->getShared('config')->path('application.cacheDir');
        $di->set($this->providerName, function () use ($cacheDir) {
            return new MetaDataAdapter([
                'metaDataDir' => $cacheDir . 'metaData/',
            ]);
        });
    }
}