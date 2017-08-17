# GetFirst2Sentences

Abandoned WIP of a mediawiki extension that was supposed to be used to get the first 2 sentences of a page from within a template using a magicword. Abandoned because php doesn't have proper regex match (returns true/false instead of a match).

Looks like it IS possible to match properly: http://php.net/manual/en/function.preg-match.php

>You use the $matches argument to get the matches. If you are just setting it equal to the function then you are getting if it passes the regex provided.

>So preg_match("expression", "string", $matches) would put the matches in $matches. Same for preg_match_all.