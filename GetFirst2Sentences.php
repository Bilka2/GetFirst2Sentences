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
			$page = WikiPage::factory($parser->getTitle())
            //$article = new \Article($parser->getTitle());
            $content = $page->getRevision()->getContent( Revision::RAW );
			$ret = ContentHandler::getContentText( $content );
        }

        return true;
    }
}
