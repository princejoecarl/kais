<?php

namespace App\Models;

class KnowledgeLevel
{
    public const BEGINNER = 'beginner';
    public const INTERMEDIATE = 'intermediate';
    public const ADVANCE = 'advance';

    public static function getKnowledgeLevels() : array
    {
        return [
            self::BEGINNER => ucwords(self::BEGINNER),
            self::INTERMEDIATE => ucwords(self::INTERMEDIATE),
            self::ADVANCE => ucwords(self::ADVANCE),
        ];
    }
}
