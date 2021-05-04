<?php

function uniqueFolder () {
	$dirname = uniqid();
	$path = $_SERVER['DOCUMENT_ROOT'] . "/api/autoremote-gallery/" . $dirname;
	mkdir($path,0755);
	echo $dirname;
}

function makeBatchFile ($asfile,$uf) {
    global $egPCfiles;    
    $asfile = explode(",",$asfile);		        
    echo "FTP -v -i -s:C:\Users\Dave\Documents\BatchFiles\autoremote_send_$uf.txt\n";
    echo "timeout /t 60\n";
    echo "del \Q $egPCfiles" . $uf . ".photo\n";
    foreach ($asfile as $asfileVal) {
        echo "del \Q $egPCfiles" . substr($asfileVal,strrpos($asfileVal,"/")+1) . "\n";
    }
    echo "del \Q $egPCfiles" . "AR-send-photos-$uf.bat";
}

function makeScriptFile ($asfile,$uf) {
    global $egPCfiles;    
    $asfile = explode(",",$asfile);		        
    echo "open ftp.handlersspot.net\n";
    echo "mrbiggz6\n";
    echo "\$ky66Open\n";
    echo "lcd $egPCfiles" . $uf . "\n";
    echo "cd  public_html/api/autoremote-gallery/$uf\n";
    echo "binary\n";
    echo "mput \"$uf.photo\"\n";
    foreach ($asfile as $asfileVal) {
        echo "mput \"" . substr($asfileVal,strrpos($asfileVal,"/")+1) . "\"\n";
    }
    echo "disconnect\n";
    echo "bye";    
}

?>