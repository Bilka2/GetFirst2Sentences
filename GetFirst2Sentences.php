<?php

namespace GetFirst2Sentences;

class GetFirst2Sentences
{
    public static function registerMagicWord(array &$variableIds)
    {
        $variableIds[] = 'getfirst2sentences';
    }

    public static function getMagicWord(\Parser $parser, array $cache, $magicWordId, &$ret)
    {
        if ($magicWordId == 'getfirst2sentences') {
            $article = new \Article($parser->getTitle());
            //$ret = $article->getContext()->getLanguage()->getCode();
			$ret = "Hi";
        }

        return true;
    }
}
