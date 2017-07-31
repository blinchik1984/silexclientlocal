<?php


namespace AdServer\ClientLocal\Components;


use AdServer\Engine\Components\Engine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class Client
{
    protected $app;
    protected $prefix;

    public function __construct(
        $prefix = ''
    )
    {
        $this->prefix = $prefix;
    }

    public function request(string $uri) : Response
    {
        $request = Request::create($this->prefix . $uri);
        return Engine::getApp()->handle($request, HttpKernelInterface::SUB_REQUEST, false);
    }
}