<?php

require_once( "commandLine.inc" );
require_once( "importLogs.inc" );

#print $text;
#exit();

foreach( LogPage::validTypes() as $type ) {
	if( $type == '' ) continue;
	
	$page = LogPage::logName( $type );
	$log = new Article( Title::makeTitleSafe( NS_PROJECT, $page ) );
	$text = $log->getContentWithoutUsingSoManyDamnGlobals();

	$importer = new LogImporter( $type );
	$importer->dummy = true;
	$importer->importText( $text );
}

?>