<?php

function renderThreadShort($id,$mid)
{
    $src = "";
    $xml=simplexml_load_file("db/$id/$id.xml");
    $title = utf8_decode($xml->title);
    $date = date("d-m-Y H:i:s",$mid);
    $src = <<< EOF
    <div class="threadShort" style="margin: 10 10 10 10;width:90%;">
    <div class="threadShortTitle"><strong><a href="./thread.php?id=$id">$title</a></strong>
    <br/><br/><p align="right" style="color:#444444;">$date</p><br/></div>
    </div>
EOF;
    return $src;
}

function renderAllThreadsShort()
{
    $files = glob("db/*");
    $lastMessage = array();
    foreach ( $files as $file ) {
	if ( is_dir($file) ) {
	    $msgs = glob("$file/*.xml");
	    $ar = array_reverse($msgs);
	    $lastMessage[basename($ar[0],".xml")] = $file;
	}
    }
    krsort($lastMessage);
    foreach ($lastMessage as $key => $file) {
	if ( is_dir($file) ) {
	    echo renderThreadShort(basename($file),basename($key,".xml"));
	    echo "<br/>";
	}
    }
}

function renderMessage($id,$mid)
{
    $src = "";
    $xml=simplexml_load_file("db/$id/$mid.xml");
    $message = utf8_decode($xml->message);
    $date = date("d-m-Y H:i:s",$mid);
    $src = <<< EOF
    <br/>
    <br/>
    <div class="threadMessage">$message
    <br/><br/><p align="right" style="color:#444444;">$date</p><br/></div>
    <br/>
EOF;
    return $src;
}

function renderThread($id)
{
    $src = "";
    $xml=simplexml_load_file("db/$id/$id.xml");
    $title = utf8_decode($xml->title);
    $message = utf8_decode($xml->message);
    $date = date("d-m-Y H:i:s",$id);
    $replies = "";
    $files = glob("db/$id/*.xml");
    foreach ($files as $file) {
	$mid = basename($file,".xml");
	if ( $mid != $id ) {
	    $replies .= renderMessage($id,$mid);
	    $replies .= "<br/>";
	}
    }
    $src = <<< EOF
    <div class="thread" style="margin: 10 10 10 10;width:90%;">
    <div class="threadTitle"><strong><a href="./thread.php?id=$id">$title</a></strong></div>
    <br/>
    <div class="threadMessage">$message
    <br/><br/><p align="right" style="color:#444444;">$date</p><br/></div>
    $replies
    <br/>
    </div>
EOF;
    return $src;
}

function clearThreads($dir)
{
    $files = glob("$dir/*");
    foreach ($files as $file) {
	(is_dir("$file")) ? clearThreads("$file") : unlink("$file");
    }
    return rmdir("$dir"); 
}

function getNewThreadId()
{
    $id = time();
    while ( file_exists("db/".$id) ) {
	$id++;
    }
    return $id;
}

function getNewMessageId($id)
{
    $mid = time();
    while ( file_exists("db/".$id."/".$mid.".xml") ) {
	$mid++;
    }
    return $mid;
}

function xmlCompose($title,$message)
{
    $xml = <<< EOF
<?xml version="1.0" encoding="iso-8859-1"?>
<post>
<title>$title</title>
<message>$message</message>
</post>
EOF;
    return $xml;
}

function postNewThread($title,$message)
{
    $id = getNewThreadId();
    $title = htmlspecialchars($title);
    $message = htmlspecialchars($message);
    if ( strlen(trim($title)) == 0 ) {
	$title = substr($message,0,16) . " ...";
    }
    if ( strlen(trim($message)) == 0 ) {
	header('Location: '. "./test.php");
	exit(0);
    }
    mkdir("db/".$id);
    $file = fopen("db/$id/$id.xml","w");
    fwrite($file,xmlCompose($title,$message));
    fclose($file);
    header('Location: '. "./test.php");
    exit(0);
}

function postNewMessage($id,$message)
{
    $mid = getNewMessageId($id);
    $message = htmlspecialchars($message);
    $file = fopen("db/$id/$mid.xml","w");
    fwrite($file,xmlCompose("",$message));
    fclose($file);
    header('Location: '. "./thread.php?id=$id");
    exit(0);
}

?>
