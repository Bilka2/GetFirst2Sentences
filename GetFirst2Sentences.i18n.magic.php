<?php
/**
 * Step 1: choose a magic word ID
 * Step 2: define some words to use in wiki markup
 */

$magicWords = array();

/** English (English) */
$magicWords['en'] = array(
	// tell MediaWiki that all {{GetFirst2Sentences}}, {{First2Sentences}},
	// and all case variants found in wiki text should be mapped to magic ID
	// 'getfirst2sentences_var1' (0 means case-insensitive)
	'getfirst2sentences_var1' => array( 0, 'GetFirst2Sentences', 'First2Sentences' ),
);