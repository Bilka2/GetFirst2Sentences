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
			$page = \WikiPage::factory($parser->getTitle());
            $content = $page->getRevision()->getContent( \Revision::RAW );
			$text = \ContentHandler::getContentText( $content );
			preg_match('/^[^{\n][^.]+.[^.]+./m', $text, $matches);
			//remove links
			$noInterwiki = preg_replace('/\[\[|\]\]/', '', preg_replace('/\[\[[^\|\]]+\|/', '', $matches[0]) );
			$noLinks = preg_replace('/\[|\]/', '', preg_replace('/\[[^\s\]]*( |\])/', '', $noInterwiki) );
			$ret = $noLinks;
        }

        return true;
    }
}
