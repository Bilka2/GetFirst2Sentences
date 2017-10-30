<?php
/*
 * Step 4: assign a value to our variable
 */
/* $wgHooks['ParserGetVariableValueSwitch'][] = 'wfGetFirst2SentencesAssignAValue'; */
function wfGetFirst2SentencesAssignAValue( &$parser, &$cache, &$magicWordId, &$ret ) {
	if ( $magicWordId == 'getfirst2sentences_var1' ) {
		// We found a value
    //$parser->getWikiPage() this would be regex searched but php can't really do that so this project is done lul
		$ret = 'This is a really silly value';
	}
	return true;
}

/**
 * Step 6: register wiki markup words associated with
 *         MAG_NIFTYVAR as a variable and not some
 *         other type of magic word
 */
// $wgHooks['MagicWordwgVariableIDs'][] = 'wfGetFirst2SentencesDeclareVarIds';
function wfGetFirst2SentencesDeclareVarIds(array &$variableIds ) {
	// $customVariableIds is where MediaWiki wants to store its list of custom
	// variable IDs. We oblige by adding ours:
	$variableIds[] = 'getfirst2sentences_var1';

	// must do this or you will silence every MagicWordwgVariableIds hook
	// registered after this!
	return true;
}
