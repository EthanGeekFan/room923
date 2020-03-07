<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <title>Arcade | Mafia</title>
    <link rel="shortcut icon" href="/favicon.png">
    <!-- <link rel="stylesheet" href="/css/global.css"> -->
    <style>
        html,
        body {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        html {
            /* background-color: rgb(186, 128, 252); */
            background: linear-gradient(180deg, #6e8efb, #a777e3);
        }

        p.head {
            position: fixed;
            z-index: 1;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* width: 400px; */
            /* height: 500px; */
            padding: 0;
            margin: 0;
            /* background-color: grey; */
            /* display: block; */
        }

        p.head {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16rem;
            font-weight: bold;
            color: rgba(61, 61, 61, 0.151);
        }

        div.content {
            position: relative;
            z-index: 10;
            width: 100%;
            /* width: 500px; */
            /* height: 900px; */
            /* max-width: 800px; */
            /* position: absolute; */
            margin-top: calc(100vh - 80px);
        }

        div.contentBackground {
            position: absolute;
            top: 80px;
            width: inherit;
            background-color: #f8f8f8;
            box-shadow: -20px 0px 50px rgba(80, 80, 80, 0.568);
            bottom: 0;
        }

        div.contentContainer {
            position: relative;
            padding: 80px 50px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0px 10px 20px rgba(1, 1, 1, 0.1);
            text-align: center;
            border-radius: 20px;
            z-index: 9;
        }

        h1.title {
            position: fixed;
            z-index: 2;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            font-size: 100px;
            font-family: Arial, Helvetica, sans-serif;
            color: white;
        }

        #role {
            color: rgb(255, 184, 53);
            font-size: 140px;
        }

        .item {
            position: relative;
            margin: 0;
            margin-top: 50px;
            /* padding: 40px 20px; */
            height: 50px;
            background-color: thistle;
        }

        .items {
            padding: 0;
        }

        .items li {
            list-style-type: none;
            display: list-item;
            padding-bottom: 80px;
            text-align: left;

        }

        .content li h2 {
            padding: 0;
            margin: 0;
            font-size: 3em;
        }

        .bg {
            overflow: hidden;
            border-radius: 20px;
            height: 400px;
            width: 100%;
            background: url('/arcade/topdown/topdown.png') no-repeat center;
            background-size: cover;
            box-shadow: 0px 20px 30px rgba(1, 1, 1, 0.26);
        }

        div.caption {
            /* margin-top: 400px; */
            transform: translateY(-100%);
            width: 100%;
            text-align: center;
            background-color: rgba(151, 151, 151, 0.301);
            color: white;
            z-index: 11;
        }

        div.mask {
            transition: 0.5s;
            height: inherit;
            width: inherit;
            z-index: 13;
            color: transparent;
            background: linear-gradient(90deg, rgba(255, 111, 0, 0), rgba(255, 145, 0, 0));
        }

        div.mask p {
            margin: 0;
            display: block;
            /* position: absolute; */
            /* right: 0; */
            padding: 30px 40px;
            font-size: 1.5rem;
            /* margin-inline-end: 40px; */
        }

        div.mask:hover {
            transition: 1s;
            background: linear-gradient(90deg, rgba(255, 111, 0, 1), rgba(255, 145, 0, 1));
            color: white;
        }

        div.footer {
            height: 250px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            z-index: 5;
        }

        div.footer a {
            font-size: 23px;
            text-decoration: none;
            color: rgba(255, 145, 0, 1);
        }

        #name {
            font-size: 26px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <p class="head"><i>
            ARCADE
        </i></p>
    <h1 class="title"><b>WELCOME<br>TO<br><i id="role">Arcade</i><br>923</b></h1>
    <div class="content">
        <div class="contentBackground"></div>
        <!-- <div class="contentContainer">
            <h2 style="font-size: 5em; padding: 0; margin: 0;">Hello World!</h2>
        </div> -->
        <div class="contentContainer" style="margin-top: 50px;">
            <ul class="items">
                <li>
                    <div class="bg" onmouseover="" onmouseout="" id="i">
                        <div class="mask">
                            <p>
                                <b>THIS IS THE DESCRIPTION OF THE GAME</b>
                                <br>
                                <br>
                                This text field should be provided by the game maker to describ his or her game. The
                                description here should include the style of the game, for example,
                                how many people can be involved, whether it needs good quality of internet connection,
                                the average/typical time per round. It should be in detail but
                                concise.
                            </p>
                        </div>
                        <a href="/arcade/topdown/" style="display: block; text-decoration: none;">
                            <div class="caption">
                                <h2 style="font-weight: normal;">Topdown</h2>
                            </div>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="bg" onmouseover="" onmouseout="" id="i">
                        <div class="mask">
                            <p>
                                <b>THIS IS THE DESCRIPTION OF THE GAME</b>
                                <br>
                                <br>
                                This text field should be provided by the game maker to describ his or her game. The
                                description here should include the style of the game, for example,
                                how many people can be involved, whether it needs good quality of internet connection,
                                the average/typical time per round. It should be in detail but
                                concise.
                            </p>
                        </div>
                        <a href="/arcade/topdown/" style="display: block; text-decoration: none;">
                            <div class="caption">
                                <h2 style="font-weight: normal;">Topdown</h2>
                            </div>
                        </a>
                    </div>
                </li>

                <li style="padding-bottom: 0;">
                    <div class="bg" onmouseover="" onmouseout="" id="i">
                        <div class="mask">
                            <p>
                                <b>THIS IS THE DESCRIPTION OF THE GAME</b>
                                <br>
                                <br>
                                This text field should be provided by the game maker to describ his or her game. The
                                description here should include the style of the game, for example,
                                how many people can be involved, whether it needs good quality of internet connection,
                                the average/typical time per round. It should be in detail but
                                concise.
                            </p>
                        </div>
                        <a href="/arcade/topdown/" style="display: block; text-decoration: none;">
                            <div class="caption">
                                <h2 style="font-weight: normal;">Topdown</h2>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="footer">
            <div class="declaration" style="color: #aaa;">
                <div id="name">
                    <h2>Room923</h2>
                </div>
                <div id="author">Created by <a href="https://github.com/EthanGeekFan/room923/">Room923</a> | <a href="https://github.com/EthanGeekFan/">Yifan Yang</a></div>
                <div style="margin-top: 15px;">All Rights Reserved</div>
            </div>
        </div>
    </div>
</body>

</html>