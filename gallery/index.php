<!DOCTYPE html>
<html>

<head>
    <title>
        Our Legendary Gallery
    </title>
    <link rel="stylesheet" href="/css/global.css">
    <link rel="shortcut icon" href="/favicon.png">
</head>

<body>
    <div class="welcome">
        <div calss="title">
            <h1 class="title">OUR<br><i style="color: rgb(255, 184, 53);">Legendary</i><br>Past</h1>
        </div>
        <div class="jump">
            <a href="#content"><button class="portal">EXPLORE</button></a>
        </div>
    </div>
    <div class="content" id="content">
        <div class="videos">
            <!-- <div class="item">
                <video width="500" height="281.25" controls>
                    <source src="videos/lihui.mp4" type="video/mp4">
                    </object> 
                  </video>
            </div>
            <div class="item">
                <video width="500" height="281.25" controls>
                    <source src="/vids/VID_20181120_235148.mp4" type="video/mp4">
                    </object> 
                  </video>
            </div>
            <div class="item">
                <video width="500" height="281.25" controls>
                    <source src="/vids/VID_20181121_004604.mp4" type="video/mp4">
                    </object> 
                  </video>
            </div>
            <div class="item">
                <video width="500" height="281.25" controls>
                    <source src="/vids/VID_20181121_004714.mp4" type="video/mp4">
                    </object> 
                  </video> -->
                <?php
                    $videos = scandir("../vids");
                    foreach ($videos as $video) {
                        if ($video == '.' || $video == '..') {
                            continue;
                        }
                        echo '<div class="item"><video width="500" height="281.25" controls><source src="/vids/' . $video . '" type="video/mp4"></object></video></div>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>

</html>