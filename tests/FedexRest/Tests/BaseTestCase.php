<?php

namespace FedexRest\Tests;

use Dotenv\Dotenv;
use FedexRest\Authorization\Authorize;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    protected Authorize $auth;

    protected function setUp(): void
    {
        parent::setUp();
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 3));
        $dotenv->safeLoad();
    }

    protected function setupAuth(bool $raw = false): void
    {
        if($raw) {
            $this->auth = (new Authorize)
                ->asRaw()
                ->setClientId($this->getClientId())
                ->setClientSecret($this->getClientSecret());
        } else {
            $this->auth = (new Authorize)
                ->setClientId($this->getClientId())
                ->setClientSecret($this->getClientSecret());
        }
    }

    protected function getAccountNumber(): string
    {
        return $_ENV['ACCOUNT'] ?? '';
    }

    protected function getClientId(): string
    {
        return $_ENV['CLIENT_ID'] ?? '';
    }

    protected function getClientSecret(): string
    {
        return $_ENV['CLIENT_SECRET'] ?? '';
    }
}