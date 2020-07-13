<?php
declare(strict_types=1);

namespace App\Providers;

use Phalcon\Config;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class ViewProvider implements ServiceProviderInterface
{

    /**
     * @var string $providerName
     */
    protected $providerName = 'view';

    /**
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        /** @var Config $config */
        $config = $di->getShared('config');
        /** @var string $viewsDir */
        $viewsDir = $config->path('application.viewsDir');
        /** @var string $cacheDir */
        $cacheDir = $config->path('application.cacheDir');


        $di->setShared($this->providerName, function () use ($viewsDir, $cacheDir, $di) {
            $view = new View();
            $view->setDI($di);
            $view->setViewsDir($viewsDir);
            $view->registerEngines([
                '.volt' => function (View $view) use ($cacheDir, $di) {
                    $volt = new VoltEngine($view, $di);
                    $volt->setOptions([
                        'compiledPath'      => $cacheDir . 'volt/',
                        'compiledSeparator' => '_',
                    ]);

                    return $volt;
                }
            ]);

            return $view;
        });
    }
}