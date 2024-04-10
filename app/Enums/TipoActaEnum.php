<?php

namespace App\Enums;

use ReflectionClass;

abstract class TipoActaEnum
{
    const PRESIDENCIAL = 'PRE';
    const CONGRESO = 'DIP';
    const ALCALDIAS = 'ALC';
}