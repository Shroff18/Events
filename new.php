<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>css grid</title>

    <link rel="stylesheet" href="lightbox.css" type="text/css">

    <link rel="stylesheet" href="style.css">

    <style>
        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }

        .gallery-container {

            padding: 10px 12px;

            border: 6px solid #ddd15f;

            margin: 10px;

            display: grid;

            grid-template-columns: repeat(6, 1fr);

            grid-gap: .2rem;

            grid-auto-rows: 200px 400px;

        }

        .gallery-item {

            width: 100%;

            height: 100%;

            position: relative;

        }

        .image {

            width: 100%;

            height: 100%;

            overflow: hidden;

        }

        .image img {

            width: 100%;

            height: 100%;

            object-fit: cover;

            object-position: 50% 50%;

            transition: .3s linear;

            cursor: pointer;

        }

        .image img:hover {

            transform: scale(1.3);

        }

        .text {

            opacity: 0;

            position: absolute;

            top: 50%;

            left: 50%;

            transform: translate(-50%, -50%);

            color: #6eed65;

            font-size: 30px;

            transition: .3s linear;

            pointer-events: none;



        }

        .gallery-item:hover .text {

            opacity: 1;

            animation: move-down .3s linear;



        }

        @keyframes move-down {

            0% {

                top: 10%;

            }

            50% {

                top: 35%;

            }

            100% {

                top: 50%;

            }

        }



        .gallery-container div:nth-child(1) {

            grid-column: span 2;

            grid-row: span 2;

        }

        .gallery-container div:nth-child(2) {

            grid-column: span 2;

        }

        .gallery-container div:nth-child(3) {

            grid-column: span 2;

            grid-row: span 2;

        }

        .gallery-container div:nth-child(4) {

            grid-row: span 2;

            grid-column: span 2;

        }

        .gallery-container div:nth-child(5) {

            grid-column: span 2;

            grid-row: span 2;

        }

        .gallery-container div:nth-child(6) {

            grid-column: span 2;

        }

        .gallery-container div:nth-child(7) {

            grid-column: span 4;

        }

        @media(max-width: 500px) {

            .gallery-container {

                grid-template-columns: 1fr;

            }


        }
    </style>

</head>

<body>

    <h3>CSS GRID GALLERY</h3>

    <div class="container">

        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'event');
        error_reporting(0);
        $query  = "SELECT * FROM gallary";
        $run = mysqli_query($conn, $query);
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_array($run)) {
                $image = $row['img_src'];
                // $title = $row['title'];
        ?>
                <div class="gallery-container">
                    <div class="image">
                        <a href="gallary_img/<?php echo $image; ?>" data-lightbox="image-1">
                            <img src="image/<?php echo $image; ?>" data-lightbox="image-1">
                        </a>
                    </div>
                    <!-- <div class="text"> 
                        <h5><php echo $title ?></h5>
                    </div> -->
                </div>
        <?php
            }
        }
        ?>
    </div>
    <script src="jquery.js"></script>

    <script src="lightbox.min.js"></script>

</body>

</html>