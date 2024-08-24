<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHONE UNIVERSE</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a href="#"><svg height="26" viewBox="0 96 960 960" width="26">
                        <path
                            d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                    </svg></a></li>
            <li><a href="index.php">HOME</a></li>
            <li><a href="#">KATALOG</a></li>
            <li><a href="#">WISHLIST</a></li>
            <li><a href="#">LOG OUT</a></li>
        </ul>
        <ul>
            <li><a href="#">PhoneUniverse</a></li>
            <li class="hideOnMobile"><a href="#">HOME</a></li>
            <li class="hideOnMobile"><a href="#">KATALOG</a></li>
            <li class="hideOnMobile"><a href="#">WISHLIST</a></li>
            <li class="hideOnMobile"><a href="#">LOG OUT</a></li>
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg height="26" viewBox="0 96 960 960"
                        width="26">
                        <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                    </svg></a></li>
        </ul>
    </nav>

    <div class="content">
        <h1> Phone <br><span>Universe</span> </h1>
    </div>

    <script>
    function showSidebar() {
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'flex'
    }

    function hideSidebar() {
        const sidebar = document.querySelector('.sidebar')
        sidebar.style.display = 'none'
    }
    </script>
</body>

</html>