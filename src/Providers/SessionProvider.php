<?php
declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Session\Adapter\Files as SessionAdapter;

class SessionProvider implements ServiceProviderInterface
{
    /**
     * @var string $providerName
     */
    protected $providerName = 'session';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        /** @var string $savePath */
        $savePath = $di->getShared('config')->path('application.sessionSavePath');

        $di->set($this->providerName, function () use ($savePath) {
            $session  = new SessionAdapter();

            $session->start();

            return $session;
        });
    }
}