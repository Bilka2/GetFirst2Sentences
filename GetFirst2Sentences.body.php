<?php
/**
 * Step 3: Register the file with the magic words.
 */
$wgExtensionMessagesFiles['GetFirst2Sentences'] = __DIR__ . '/GetFirst2Sentences.i18n.magic.php';
/**
 * Step 4: assign a value to our variable
 */
/* $wgHooks['ParserGetVariableValueSwitch'][] = 'wfGetFirst2SentencesAssignAValue'; */
function wfGetFirst2SentencesAssignAValue( &$parser, &$cache, &$magicWordId, &$ret ) {
	if ( $magicWordId == 'getfirst2sentences_var1' ) {
		// We found a value
    //$parser->getWikiPage() this would be regex searched but php can't really do that so this project is done lul
		$ret = 'This is a really silly value';
	}
	// We must return true for two separate reasons:
	// 1. To permit further callbacks to run for this hook.
	//    They might override our value but that's life.
	//    Returning false would prevent these future callbacks from running.
	// 2. At the same time, "true" indicates we found a value.
	//    Returning false would set variable value to null.
	//
	// In other words, true means "we found a value AND other
	// callbacks will run," and false means "we didn't find a value
	// AND abort future callbacks." It's a shame these two meanings
	// are mixed in the same return value.  So as a rule, return
	// true whether we found a value or not.
	return true;
}

/**
 * Step 5: register the custom variable(s) so that it shows up in
 * Special:Version under the listing of custom variables.
 */
/*$wgExtensionCredits['variable'][] = array(
	'name' => 'GetFirst2Sentences',
	'author' => 'Bilka',
	'version' => '0.0.0',
	'description' => 'Provides a variable as an example and performs no discernible function',
	'url' => 'https://www.mediawiki.org/wiki/Extension:GetFirst2Sentences',
); */

/**
 * Step 6: register wiki markup words associated with
 *         MAG_NIFTYVAR as a variable and not some
 *         other type of magic word
 */
$wgHooks['MagicWordwgVariableIDs'][] = 'wfGetFirst2SentencesDeclareVarIds';
function wfGetFirst2SentencesDeclareVarIds( &$customVariableIds ) {
	// $customVariableIds is where MediaWiki wants to store its list of custom
	// variable IDs. We oblige by adding ours:
	$customVariableIds[] = 'getfirst2sentences_var1';

	// must do this or you will silence every MagicWordwgVariableIds hook
	// registered after this!
	return true;
}