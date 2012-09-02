<!DOCTYPE html>
<!--
  MP4 Video Player 
  Copyright (C) 2012 Brian P. Hogan
  License: MIT
  URL: http://github.com/napcs/simplevideoplayer
  Usage: Host on your server, pass it videos. Invoke without params for
         instructions on usage.
-->
<html lang="en">
  <head>
    <title>Video Player</title>
    <link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/c/video.js"></script>
  </head>
  <body>
    <?php
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
                === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];
    
    $currentUrl = $protocol . '://' . $host . $script . '?' . $params;
  
    $mp4url = $_GET["mp4url"];
    $width = $_GET["width"];
    $height = $_GET["height"]; 
    ?>

    <?php if (isset($_GET["debug"])){ ?>
      <p>Video URL: <?php echo $url; ?>
      <p>Video dimensions: <?php echo $width; ?> by <?php echo $height; ?>
    <?php } ?>

    <?php if (isset($_GET["mp4url"])){ ?>
      <video id="player" class="video-js vjs-default-skin" 
            controls preload="auto" 
            width="<?php echo $width; ?>" height="<?php echo $height; ?>" 
            poster="my_video_poster.png"
            data-setup="{}">
          <source src="<?php echo $mp4url; ?>" type='video/mp4'>
      </video> 
    <?php }else{ ?>
      <h2>Simple Video Player</h2>
      <div style="width:640px;">
        <p>This is a simple video player designed to make it easy to embed videos into other sites where you might not have complete control over HTML5 video elements. Instead, you can simply embed this page on your site and host your MP4 files anywhere else, like S3 or Dropbox.</p>
        <h3>Usage</h3>
        <p>Pass the URL in as a query parameter to use it. You can also pass the <code>width</code> and <code>height</code> parameters. </p>
        <pre>?mp4url=http://some/video.mp4&width=320&height=240
        </pre>
        <p>The best way to use this would be to put it in an IFRAME.</p>
        <textarea cols="80" rows="10"><iframe width="640" height="480" src="<?php echo $currentUrl; ?>mp4url=http://some/video.mp4&width=320&height=240"></iframe></textarea>
        <p>Powered by HTML5 and <a href="http://videojs.com/">VideoJS</a>.</p>
      </div>
      <small>Version 0.1</small>
    <?php } ?>

  </body>
</html>
