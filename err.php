<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <?php require 'links.php'?>
    <style>
        .container{
            min-height: 100vh;
            display: grid;
            place-items: center;
            text-align: center;
        }
        .heading{
            font-size: 5rem;
        }
        .texts{
            font-size: 2rem;
            font-weight: 600;
            margin: 1rem 0;
        }
        .home-btn{
            width: 12rem;
            height: 4rem;
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary-color);
            background-color: var(--accent-color);
            border: none;
            outline: none;
            border-radius: .3rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php require 'navbar.php' ?>
    <div class="container">
        <div>
            <h1 class="heading">Error 404</h1>
            <img src="img/404.png" alt="error 404">
            <p class="texts">OOPS! THAT PAGE CAN'T BE FOUND</p>
            <a href="index.php">
                <button class="home-btn">Go Home</button>
            </a>
        </div>
    </div>
    <?php require 'footer.php'?>
</body>
</html>