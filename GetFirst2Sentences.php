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
			//we might catch the ''this article is about... stuff that's on some pages, but we don't want that
			if (preg_match('/^\'\'(this (article|page)).+\'\'$/im', $text, $match)) {
				$text = substr($text, strlen($match[0]));
			}
			preg_match('/^[^{\n=<][^\.]+\.([^\n\.]+\.)?/m', $text, $matches);
			//remove links
			$noInterwiki = preg_replace('/\[\[|\]\]/', '', preg_replace('/\[\[[^\|\]]+\|/', '', $matches[0]));
			$noLinks = preg_replace('/\[|\]/', '', preg_replace('/\[[^\s\]]*( |\])/', '', $noInterwiki));
			if (strlen($noLinks) > 280) {
				$noLinks = substr($noLinks, 0, strpos($noLinks, ' ', 230)+1) . "...";
			}
			$ret = $noLinks;
        }

        return true;
    }
}
