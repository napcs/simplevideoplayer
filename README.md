Simple Video Player
=====

This is a simple MP4 video player designed to make it easy to embed videos into other sites where you might not have complete control over HTML5 video elements. Instead, you can simply embed this page on your site and host your MP4 files anywhere else, like S3 or Dropbox. It's written in PHP since PHP is available nearly everywhere.

Usage
-----
All you need is a web server that runs PHP and the `index.php` file. 

Copy the `index.php` page to a folder on your PHP-enabled web server. Test that it works by loading up the page in the browser. This will load a basic page explaining how to use the player.  

Pass the URL of the video you want to play as a query parameter. You can also pass the `width` and `height` parameters.

    ?mp4url=http://some/video.mp4&width=320&height=240

The best way to use this would be to put it in an IFRAME.

    <iframe 
      width="640" height="480" 
      src="http://example.com/path/to/player/index.php?mp4url=http://some/video.mp4&width=320&height=240">
    </iframe>


WebM Support
-----

Pass in the `webmrul` parameter with the path to your WebM video. If you only put the MP4 file in,  then it'll check to see if the browser supports MP4. If
it doesn't then it'll load a Flash-based player.


History
------
v0.4 - Uses VideoJS 4.1. Fixed putting in WebM url if it's blank. Removed forced flash support when WebM is not available as it appears VideoJS 4 does detection for us.
v0.3 - Added WebM support and forced Flash fallback if WebM is not sent in.
v0.2 - Added a form to make building the IFRAME easier.
v0.1 - Initial version

License
-----

Copyright (C) 2012-2013 Brian P. Hogan

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
