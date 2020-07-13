<?php
declare(strict_types=1);

namespace App\Http\Controller;

class HomeController extends ControllerBase
{

    /**
     * Default action. Set the public layout (layouts/public.volt)
     */
    public function initialize(): void
    {
       $this->view->setTemplateBefore('public');
    }

    public function indexAction(): void
    {
        echo 'Home index';
    }

    public function contactUsAction()
    {
        echo 'Home contact us';
    }

}

