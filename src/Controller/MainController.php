<?php
declare(strict_types=1);
/**
 * Created by cehevis inc.
 * And remember this above all: Our Mechanical gods are watching. Make sure They are not ashamed!
 */

namespace Cehevis\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public const ERROR = 'cehevis_error';
    public const INFO = 'cehevis_info';
    public const SUCCESS = 'cehevis_success';

    public function addSuccessMessage(string $message):void
    {
        $this->addFlash(self::SUCCESS, $message);
    }

    public function addErrorMessage(string $message):void
    {
        $this->addFlash(self::ERROR, $message);
    }

    public function addInfoMessage(string $message):void
    {
        $this->addFlash(self::INFO, $message);
    }
}