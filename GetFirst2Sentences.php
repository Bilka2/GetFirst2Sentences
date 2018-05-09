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
			if ($page->getRevision()) {
				$content = $page->getRevision()->getContent( \Revision::RAW );
				$text = \ContentHandler::getContentText( $content );
				//we might catch the ''this article is about... stuff that's on some pages, but we don't want that
				$text = preg_replace('/^\'\'(this (article|page)).+\'\'$/im', '', $text);
				//remove images
				$text = preg_replace('/\[\[File:([^\[\]]*?(\[.*?\]))*[^\[\]]*\]\]/i', '', $text);
				//remove interwiki links
				$text = preg_replace('/\[\[|\]\]/', '', preg_replace('/\[\[[^\]\|]+\|/', '', $text));
				//remove external links
				$noLinks = preg_replace('/\[|\]/', '', preg_replace('/\[[^\s\]]*( |\])/', '', $text));
				//match first paragraph
				if (preg_match('/^[^!\|\*#{\n=<_-][^_\n]+\n/m', $noLinks, $matches)) { 
					$sentences = $matches[0];
					/*if (strlen($sentences) > 280) {
						$sentences = substr($sentences, 0, strpos($sentences, ' ', 230)+1) . "...";
					}*/
					$ret = $sentences;
					return true;
				}
			}
			$ret = "";
			return true;
        }
        return true;
    }
}
