<?php
error_reporting(E_ERROR | E_PARSE);
//$SYSTEM_NAME = 'YouTube Thumbnail Taker';
//$DEVELOPER = 'VIKTHYR';
$_SESSION['SYSTEM_NAME'] = 'YouTube Thumbnail Taker';
$_SESSION['DEVELOPER'] = 'VIKTHYR';
$videoLink = '';
$dir = "./temp_thumbs/";

if(isset($_GET['getImage'])){
    $videoLink = @$_GET['videoLink'];
    

    if(strlen($videoLink) == 11){
        $videoID = $videoLink;
        $tryContent = file_get_contents("https://img.youtube.com/vi/$videoID/maxresdefault.jpg");

        if($tryContent === FALSE){
            $videoFound = false;
        }
        else
        {
            $videoFound = true;

            $fileMaxResolution = fopen("temp_thumbs/1280x720_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
            $dataMaxResolution = file_get_contents("https://img.youtube.com/vi/$videoID/maxresdefault.jpg");
                
            $fileSdResolution = fopen("temp_thumbs/640x480_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
            $dataSdResolution = file_get_contents("https://img.youtube.com/vi/$videoID/sddefault.jpg");
                
            $fileHqResolution = fopen("temp_thumbs/480x360_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
            $dataHqResolution = file_get_contents("https://img.youtube.com/vi/$videoID/hqdefault.jpg");

            $fileMqResolution = fopen("temp_thumbs/320x180_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
            $dataMqResolution = file_get_contents("https://img.youtube.com/vi/$videoID/mqdefault.jpg");

            $fileDefaultResolution = fopen("temp_thumbs/120x90_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
            $dataDefaultResolution = file_get_contents("https://img.youtube.com/vi/$videoID/default.jpg");

            fwrite($fileMaxResolution, $dataMaxResolution);
            fwrite($fileSdResolution, $dataSdResolution);
            fwrite($fileHqResolution, $dataHqResolution);
            fwrite($fileMqResolution, $dataMqResolution);
            fwrite($fileDefaultResolution, $dataDefaultResolution);
        }
    }
    else if(str_contains($videoLink, 'youtube') || str_contains($videoLink, 'youtu.be'))
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $videoLink, $match);
        $videoID = $match;
        $videoID = $videoID[1];
        
        $tryContent = file_get_contents("https://img.youtube.com/vi/$videoID/maxresdefault.jpg");

        if($tryContent === FALSE){
            $videoFound = false;
        }
        else
        {
        $videoFound = true;

        $fileMaxResolution = fopen("temp_thumbs/1280x720_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
        $dataMaxResolution = file_get_contents("https://img.youtube.com/vi/$videoID/maxresdefault.jpg");
        
        $fileSdResolution = fopen("temp_thumbs/640x480_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
        $dataSdResolution = file_get_contents("https://img.youtube.com/vi/$videoID/sddefault.jpg");
        
        $fileHqResolution = fopen("temp_thumbs/480x360_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
        $dataHqResolution = file_get_contents("https://img.youtube.com/vi/$videoID/hqdefault.jpg");

        $fileMqResolution = fopen("temp_thumbs/320x180_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
        $dataMqResolution = file_get_contents("https://img.youtube.com/vi/$videoID/mqdefault.jpg");

        $fileDefaultResolution = fopen("temp_thumbs/120x90_thumbnail_$videoID.jpg",'w') or die("Cannot open file.");
        $dataDefaultResolution = file_get_contents("https://img.youtube.com/vi/$videoID/default.jpg");

        fwrite($fileMaxResolution, $dataMaxResolution);
        fwrite($fileSdResolution, $dataSdResolution);
        fwrite($fileHqResolution, $dataHqResolution);
        fwrite($fileMqResolution, $dataMqResolution);
        fwrite($fileDefaultResolution, $dataDefaultResolution);
        }
    }
}



foreach(glob($dir."*.jpg") as $file){
    if(time() - filectime($file) > 86400){
        unlink($file);
    }
}

include('./views/header.html');
include('./views/index.html');
include('./views/info.html');
include('./views/footer.html')

?>