<?php
$filename = 'Temperature0.txt';
$file = fopen($filename, "r") or die("Unable to open file!");
$filedata = explode( "\r\n", fread( $file,filesize( $filename ) ) );
fclose( $file );

unset( $filedata[0] );
$data = [];

foreach( $filedata as $line ){
    $exp = "/[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4} ([0-9]{1,2}):([0-9]{1,2}) ([0-9]{1,2})/";
    $matched = preg_match( $exp, $line, $matches );
    if( $matched ){
        $data['temparature'][] = [[(int) $matches[1], (int) $matches[2], 0], (int) $matches[3]];
    }
}

echo json_encode( $data );