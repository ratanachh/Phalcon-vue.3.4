<?php
declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Security;

class SecurityProvider implements ServiceProviderInterface
{
    /**
     * @var string $providerName
     */
    protected $providerName = 'security';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $di->set($this->providerName, function () use ($di) {
            $security = new Security();
            $security->setDI($di);

            return $security;
        });
    }
}