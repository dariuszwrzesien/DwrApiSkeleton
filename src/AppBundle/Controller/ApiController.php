<?php

namespace AppBundle\Controller;

use AppBundle\ServicesTrait;
use FOS\RestBundle\Controller\FOSRestController;

abstract class ApiController extends FOSRestController
{
    use ServicesTrait;
}
