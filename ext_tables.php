<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
$tempColumns = Array (
	"tx_mouseoverimages_enableoverlay" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:mouseoverimages/locallang_db.xml:tt_content.tx_mouseoverimages_enableoverlay",
		"config" => Array (
			"type" => "check",
		)
	),
	"tx_mouseoverimages_highlight" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:mouseoverimages/locallang_db.xml:tt_content.tx_mouseoverimages_highlight",
		"config" => Array (
			"type" => "check",
		)
	),
	"tx_mouseoverimages_overlayimages" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:mouseoverimages/locallang_db.xml:tt_content.tx_mouseoverimages_overlayimages",		
		"displayCond" => "FIELD:tx_mouseoverimages_highlight:REQ:false",
		"config" => Array (
			"type" => "group",
			"internal_type" => "file",
			"allowed" => $GLOBALS["TYPO3_CONF_VARS"]["GFX"]["imagefile_ext"],	
			"max_size" => 500,	
			"uploadfolder" => "uploads/tx_mouseoverimages",
			"show_thumbs" => 1,	
			"size" => 3,	
			"minitems" => 0,
			"maxitems" => 100,
		)
	),
);


t3lib_div::loadTCA("tt_content");
t3lib_extMgm::addTCAcolumns("tt_content",$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes("tt_content","tx_mouseoverimages_enableoverlay;;;;1-1-1, tx_mouseoverimages_highlight, tx_mouseoverimages_overlayimages",'textpic,image','after:longdescURL');

t3lib_extMgm::addStaticFile($_EXTKEY,'static/Mouse_over_Images/', 'Mouse Over Effects for Images');
?>