<?php
namespace Alumnot\PennylessTrack;

class Version {
    public const VERSION = '1.0';

    public static function get(): string     {
        return self::VERSION;
    }
}