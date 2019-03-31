<?php

use PetrKnap\Php\Singleton\SingletonInterface;
use PetrKnap\Php\Singleton\SingletonTrait;

abstract class Singleton implements SingletonInterface
{
    use SingletonTrait;
}