<?php


namespace Simple\Core;


class Factory
{
    public function __invoke($className)
    {
        return new $className();
    }
}