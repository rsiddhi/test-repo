<?php

if(getenv('APP_ENV') != 'local' && getenv('APP_ENV') != 'producation'){
	return [
	    'CSV_FILE_PATH' => $_SERVER['DOCUMENT_ROOT'].'/CSV/members_test.csv'
	];
}

return [
    'CSV_FILE_PATH' => $_SERVER['DOCUMENT_ROOT'].'/CSV/members.csv'
];