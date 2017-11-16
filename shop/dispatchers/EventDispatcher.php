<?php

namespace shop\dispatchers;

interface EventDispatcher
{
    public function dispatchAll(array $events);
    public function dispatch($event);
}