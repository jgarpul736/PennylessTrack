<?php
namespace Alumnot\PennylessTrack;

class Version {
    public const VERSION = '1.1';

    public static function get(): string     {
        return self::VERSION;
    }
}