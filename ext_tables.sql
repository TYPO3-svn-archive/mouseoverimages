#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_mouseoverimages_enableoverlay tinyint(3) DEFAULT '0' NOT NULL,
	tx_mouseoverimages_highlight tinyint(3) DEFAULT '0' NOT NULL,
	tx_mouseoverimages_overlayimages blob NOT NULL
);