<?php

function renderThreadShort($id)
{
    $src = "";
    $xml=simplexml_load_file("db/$id/$id.xml");
    $title = utf8_decode($xml->title);
    $date = date("d-m-Y H:i:s",$id);
    $src = <<< EOF
    <div class="threadShort">
    <div class="threadShortTitle"><strong>$date <a href="./thread.php?id=$id">$title</a></strong></div>
    </div>
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
    $src = <<< EOF
    <div class="thread">
    <div class="threadTitle"><strong><h1>$date $title</h1></strong></div>
    <br/>
    <div class="threadMessage">$message</div>
    <br/>
    </div>
EOF;
    return $src;
}

function renderAllThreadsShort()
{
    $files = glob("db/*");
    foreach (array_reverse($files) as $file) {
	if ( is_dir($file) ) {
	    echo renderThreadShort(basename($file));
	    echo "<br/>";
	}
    }
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
    mkdir("db/".$id);
    $title = htmlspecialchars($title);
    $message = htmlspecialchars($message);
    $file = fopen("db/$id/$id.xml","w");
    fwrite($file,xmlCompose($title,$message));
    fclose($file);
    header('Location: '. "./test.php");
    exit(0);
}

?>
