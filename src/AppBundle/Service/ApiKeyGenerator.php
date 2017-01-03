<?php

namespace AppBundle\Service;

class ApiKeyGenerator
{
    /**
     * Generates unique api key
     * @return string
     */
    static public function generate()
    {
        return base64_encode(microtime().uniqid().rand());
    }
}