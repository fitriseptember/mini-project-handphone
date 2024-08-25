<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Showcase</title>
    <style>
        body {
            background-color: #ffe4e1;
            /* Light pink background */
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #ff69b4;
            /* Hot pink color for main title */
            margin-top: 20px;
        }

        h2 {
            color: #ff1493;
            /* Deep pink for sub-titles */
            text-align: center;
            /* Center the sub-titles */
            margin-top: 20px;
        }

        video {
            display: block;
            margin: 10px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .button {
            display: block;
            width: 200px;
            margin: 30px auto;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            background-color: #ff69b4;
            /* Hot pink */
            color: white;
            border-radius: 20px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #ff1493;
            /* Deep pink on hover */
        }
    </style>
</head>

<body>
    <h1>Video Showcase</h1>

    <h2>Galaxy Z Fold 5G</h2>
    <video controls src="galaxy z fold 5g.mp4" width="320" height="240">
        Your browser does not support the video tag.
    </video>

    <h2>Galaxy M14 5G</h2>
    <video controls src="galaxy m14 5g.mp4" width="320" height="240">
        Your browser does not support the video tag.
    </video>

    <h2>Redmi Note 12</h2>
    <video controls src="redmi note 12.mp4" width="320" height="240">
        Your browser does not support the video tag.
    </video>

    <h2>Redmi Note 13</h2>
    <video controls src="redmi note 13.mp4" width="320" height="240">
        Your browser does not support the video tag.
    </video>

    <h2>Oppo Reno 11</h2>
    <video controls src="oppo reno 11.mp4" width="320" height="240">
        Your browser does not support the video tag.
    </video>

    <h2>Oppo Find N2 Flip</h2>
    <video controls src="oppo find n2 flip.mp4" width="320" height="240">
        Your browser does not support the video tag.
    </video>

    <a href="halaman-berikutnya.html" class="button">Pergi ke Halaman Berikutnya</a>
</body>

</html>