<!DOCTYPE html>
<!--
  MP4 Video Player 
  Copyright (C) 2012-2014 Brian P. Hogan
  License: MIT
  URL: http://github.com/napcs/simplevideoplayer
  Usage: Host on your server, pass it videos. Invoke without params for
         instructions on usage.
-->
<html lang="en">
  <head>
    <title>Video Player</title>
    <link href="https://vjs.zencdn.net/4.3/video-js.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="https://vjs.zencdn.net/4.3/video.js"></script>
    <style>
      body {
        margin: 0;
        padding: 0;
      }

      .video-js p {
        margin: 0;
      }
    </style>
  </head>
  <body>
    <?php
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
                === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];
    
    $currentUrl = $protocol . '://' . $host . $script . '?' . $params;
  
    $mp4url = (urldecode($_GET["mp4url"]));
    if (isset($_GET["webmurl"])){
      $webmurl = (urldecode($_GET["webmurl"]));
    }   

    $width = $_GET["width"];
    $height = $_GET["height"]; 
    
    ?>
    
    
    <?php if (isset($_GET["debug"])){ ?>
      <p><?php echo $myArray[0]; ?></p>
      <p>Params: <?php echo $params; ?></p>
      <p>MP4 URL: <?php echo $mp4url; ?></p>
      <p>WebM URL: <?php echo $webmurl; ?></p>
      <p>Video dimensions: <?php echo $width; ?> by <?php echo $height; ?></p>
      <p>Settings <?php echo $setup; ?></p>
      
    <?php } ?>

    <?php if (isset($_GET["mp4url"])){ ?>
      <video id="player" class="video-js vjs-default-skin" 
          controls preload="auto" 
          width="<?php echo $width; ?>" height="<?php echo $height; ?>" 
          data-setup='{}'>
          <source src="<?php echo $mp4url; ?>" type='video/mp4'>
          <?php if (isset($webmurl)){ ?>
            <source src="<?php echo $webmurl; ?>" type='video/webm'>
          <? } ?>
      </video> 
        
    <?php }else{ ?>
      <h2>Simple Video Player</h2>
      <div style="width:640px;">
        <p>
          This is a simple video player designed to make it easy to embed
          videos into other sites where you might not have complete control
          over HTML5 video elements. Instead, you can simply embed this page
          on your site and host your MP4 files anywhere else, like S3 or
          Dropbox.
        </p>
        <h3>Usage</h3>
        <p>Pass the URL in as a query parameter to use it. You can also pass the <code>width</code> and <code>height</code> parameters. </p>
        <pre>
          ?mp4url=http://some/video.mp4&amp;width=320&amp;height=240
        </pre>
        <p>The best way to use this would be to put it in an IFRAME. Use this form to build your <code>iframe</code>:</p>
        
        <form id="editor">
          <label>URL to MP4 video <input type="url" id="mp4"></label>
          <br>
          <label>URL to WebM video <input type="url" id="webm"></label>
          <br>
          
          <label>width <input value="640" type="number" id="width"></label>
          <label>height <input value="480" type="number" id="height"></label>
          <input type="submit">
          <textarea id="code" cols="80" rows="10"><iframe width="640" height="480" allowfullscreen src="<?php echo $currentUrl; ?>mp4url=http://some/video.mp4&width=640&height=480"></iframe></textarea>
        </form>
        <script>
          $("#editor").submit(function(e){
            e.preventDefault();

            var code, height, width, mp4, videoheight, videowidth, webm, width;
            code = $("#code");
            mp4 = $("#mp4").val();
            webm = $("#mp4").val();
            height = $("#height").val();
            width = $("#width").val();
            videoheight = height;
            videowidth = width;
            
            var output = '<iframe width="' + width + '" height="' + height + '" src="' + document.location + '?mp4url=' + mp4;
            
            if(!webm === ""){
              output += '&webmurl=' + webm;
            }
            
            output += '&width=' + videowidth + '&height=' + videoheight + '"><\/iframe>';

            code.html(output);
          });
        </script>



        <p>Powered by HTML5 and <a href="http://videojs.com/">VideoJS</a>.</p>
      <p><small>Version 0.5</small></p>
      <p><a href="https://github.com/napcs/simplevideoplayer">Source at Github</a></p>
      
      </div>
      
    <?php } ?>

  </body>
</html>
