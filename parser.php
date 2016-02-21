<?php
$filenames = [];
$filenames[] = 'Temperature0.txt';
$filenames[] = 'Humidity0.txt';
$filenames[] = 'Moisture.txt';

$data = [
    'temperature' => parse_file( $filenames[0] ),
    'humidity' => parse_file( $filenames[1] ),
    'moisture' => parse_file( $filenames[2] )
    ];

echo json_encode( $data );

function parse_file( $filename ){
    $file = fopen($filename, "r") or die("Unable to open file!");
    $filedata = explode( "\r\n", fread( $file,filesize( $filename ) ) );
    fclose( $file );
    
    unset( $filedata[0] );
    $op = [];
    
    foreach( $filedata as $line ){
        $exp = "/[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4} ([0-9]{1,2}):([0-9]{1,2}) ([0-9]{1,2})/";
        $matched = preg_match( $exp, $line, $matches );
        if( $matched ){
            $op[] = [[(int) $matches[1], (int) $matches[2], 0], (int) $matches[3]];
        }
    }
    
    return $op;
}