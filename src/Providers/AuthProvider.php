<?php
declare(strict_types=1);

namespace App\Providers;

use App\Plugins\Auth;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;

class AuthProvider implements ServiceProviderInterface
{
    /**
     * @var string $providerName
     */
    protected $providerName = 'auth';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $di->setShared($this->providerName, Auth::class);
    }
}