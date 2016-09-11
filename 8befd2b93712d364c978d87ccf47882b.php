<?php
/**
 	    Original Flash Movie: http://youareanidiot.org/
	    Audio from http://shane-o.com/sound-drops/163-idiot-drop
	    This implementation: Rodney Rehm - http://rodneyrehm.de/en/
*/	    
// This file will be included in index.php incase the user has set "idiotmode" to true
require 'errorcodesAndTitles.php';
require_once 'config.php';
?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<?php echo "<title>" . sitename . " - " . $siteTitles['troll'] . "</title>"; -->
	
	<style>
	    body {
	        margin: 0; 
	        padding: 0; 
	        font-family: Comic Sans;
	        font-weight: bold;
	        font-size: 16px;
            color: #CCC;
	        background: white;
	        -webkit-transition: background-color 0.05s ease-in 0s,
	                            color 0.05s ease-in 0s;
	                transition: background-color 0.05s ease-in 0s,
	                            color 0.05s ease-in 0s;
	    }
	    
	    .browser-fail .happy {
	        display: none;
	    }
	    
	    .no-track {
	        color: black;
	    }
	    
	    #idiot-text,
	    #idiot-face {
	        display: block;
            padding: 1em;
	        text-align: center;
	        font-size: 4em;
	    }
	    
	    #idiot-text span {
	        white-space: nowrap;
	    }
	    
	    #idiot-face {
	        padding: 0;
	        font-size: 10em;
	        color: black;
	    }
	    
	    .visited {
	        color: #666;
	    }
	    
	    .active {
	        color: #336699;
	    }
	    
	    .inverted {
	        background: black;
	        color: #333;
	    }
	    
	    .inverted.no-track {
	        color: white;
	    }
	    
	    .inverted .visited {
	        color: #AAA;
	    }
	    
	    .inverted .active {
	        color: #6699CC;
	    }
	    
	    .inverted #idiot-face {
	        color: white;
	    }
	    
        @media only screen and (min-width: 1000px) {
	        body {
	            width: 1000px;
	            margin: 0 auto;
	        }
	    }
	    
        @media only screen and (max-width: 400px) {
            body {
                font-size: 10px;
            }
        }
	</style>
</head>
<body>
    
    <output id="idiot-text">
        <span id ="idiot-cue-1">you</span>
        <span id ="idiot-cue-2">are</span>
        <span id ="idiot-cue-3">an</span>
        <span id ="idiot-cue-4">idiot</span>
        <span id ="idiot-cue-5">ah</span>
        <span id ="idiot-cue-6">haha</span>
        <span id ="idiot-cue-7">ha ha ha</span>
        <span id ="idiot-cue-8">aha ha</span>
        <span id ="idiot-cue-9">ha ha</span>
        <span id ="idiot-cue-10">ha</span>
    </output>
    
    <output id="idiot-face">
        <span class="smiley happy">?</span>
        <span class="smiley sad">?</span>
        <span class="smiley happy">?</span>
    </output>
    
    <audio id="idiot-audio" volume="0.2" auto-play="off" lo-op="true">
        <source src="audio/idiot.mp3" type="audio/mp3">
        <source src="audio/idiot.ogg" type="audio/ogg">
        <source src="audio/idiot.wav" type="audio/wav">
    </audio>
    
    <script>
        (function() {
            "use strict";
            
            var output = document.getElementById('idiot-text');
            var audio = document.getElementById('idiot-audio');
            
            if (!window.Audio) {
                output.innerHTML = 'Your Browser Is An Idiot!';
                document.body.className = 'browser-fail';
                console.error('Audio not supported');
                return;
            }
            if (Audio.prototype.addTextTrack) {
                var track = audio.addTextTrack('metadata');
                var cues = [
                    {start: 0.040, stop: 0.474, id: 'idiot-cue-1', text: "you"},
                    {start: 0.580, stop: 0.860, id: 'idiot-cue-2', text: "are"},
                    {start: 0.860, stop: 1.013, id: 'idiot-cue-3', text: "an"},
                    {start: 1.069, stop: 1.672, id: 'idiot-cue-4', text: "idiot"},
                    {start: 1.945, stop: 2.112, id: 'idiot-cue-5', text: "ah"},
                    {start: 2.234, stop: 2.566, id: 'idiot-cue-6', text: "haha"},
                    {start: 2.593, stop: 3.131, id: 'idiot-cue-7', text: "ha ha ha"},
                    {start: 3.207, stop: 3.802, id: 'idiot-cue-8', text: "aha ha"},
                    {start: 3.871, stop: 4.397, id: 'idiot-cue-9', text: "ha ha"},
                    {start: 4.494, stop: 4.883, id: 'idiot-cue-10', text: "ha"}
                ];
                cues.forEach(function(cue) {
                    track.addCue(new TextTrackCue(cue.start, cue.stop, cue.id));
                });
                track.addEventListener('cuechange', function(event) {
                    if (!track.activeCues.length) {
                        return;
                    }
                    // TODO: improve this
                    [].forEach.call(output.querySelectorAll('.active'), function(node) {
                        node.classList.remove('active');
                    });
                    
                    var id = track.activeCues[0].text;
                    document.getElementById(id).className = 'visited active';
                    document.body.offsetTop;
                });
            } else {
                document.body.classList.add('no-track');
                console.error('Audio.prototype.addTextTrack() not supported');
            }
            
            audio.addEventListener('play', function(event) {
                [].forEach.call(output.childNodes, function(node) {
                    node.className = '';
                });
            });
            // loop prevents ended event (in Chrome), but wee need something to reset the canvas
            // audio.loop = true;
            audio.addEventListener('ended', function(event) {
                setTimeout(function() {
                    audio.currentTime = 0;
                    audio.play();
                }, 200);
            });
            document.addEventListener('keydown', toggle);
            document.addEventListener('touchend', toggle);
            document.addEventListener('mouseup', toggle);
            
            function toggle(event) {
                if (event.type === 'keydown' && event.keyCode != 32) {
                    return;
                }
                
                event.preventDefault();
                event.stopPropagation();
                
                audio[audio.paused ? 'play' : 'pause']();
            }
            
            function invertBackground() {
                if (!audio.paused) {
                    document.body.classList.toggle('inverted');
                }
                
                return setTimeout(invertBackground, 500);
            }
            
            audio.play();
            invertBackground();
        })();
</body>
</html>
