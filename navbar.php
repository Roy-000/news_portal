<html>

<head>
    <title> Navigation </title>

    <style>
        body {
            padding: 0px;
            margin: 0px;
        }

        li {
            float: left;
            margin-left: 50px;
            margin-top: 10px;
        }

        ul {
            list-style-type: none;
            background-color: #bf104c;
            width: 100%;
            height: 50px;
            margin: 0px;
        }

        a {
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
            color: white;

        }

        .search_bar {
            float: right;
            background-color: white;

        }

        .search_button {
            float: right;
        }
    </style>

</head>


<body>
    <ul>

        <li style="margin-left:0px;"><a href="news.php">News sharing site</a></li>
        <?php
        if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
        ?>
            <li><a href="logout_back.php"  >Logout</a></li>
        <?php
        } 
        ?>
        <li><a href="search.php">Search</a></li>

        <li>
            <a href="post_news.php"><?php
                                    if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin') {
                                        echo "<button type='button' class='btn btn-warning'>Post </button>";
                                        echo $_SESSION['role'];
                                    }
                                    ?></a>
        </li>

    </ul>

</body>


</html>