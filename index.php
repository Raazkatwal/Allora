<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalabe=no">
    <title>Allora - Your Best Fashion Store</title>
    <?php require 'links.php'?>
</head>
<body>
    <?php require 'navbar.php' ?>
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url(img/slide1.jpg);">
                <div class="slider1-text">
                    <h1 class="slider-title"><div class="diff-color-title">Christmastide</div>Fashion Collection</h1>
                    <p class="slider-des">Get Free Shipping on all order over $75</p>
                    <a href="#"><button class="slider-btn">Shop now</button></a>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url(img/slide2.jpg);">
                <div class="slider2-text">
                    <h1 class="slider-title"><span class="diff-color-title">New arrivals</span><br>Fashion Collection</h1>
                    <p class="slider-des">Get Free Shipping on all orders over $75</p>
                    <a href="#"><button class="slider-btn">Shop now</button></a>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <main id="main-content">
        <div class="categories">
            <a href="#" class="category-tile men-tile">
                <h1 class="category-title">For Men's</h1>
                <h3 class="category-link">Shop now <i class="fa-solid fa-arrow-right"></i></h3>
            </a>
            <a class="category-tile gay-tile">
                <h1 class="category-title">For Gay's</h1>
                <h3 class="category-link">Shop now <i class="fa-solid fa-transgender"></i></h3>
            </a>
            <a href="#" class="category-tile women-tile">
                <h1 class="category-title">For Women's</h1>
                <h3 class="category-link">Shop now <i class="fa-solid fa-arrow-right"></i></h3>
            </a>
        </div>
        <h1 class="product-grid-heading">Shop bags</h1>
        <div class="product-grid">
            <?php
            for ($i=0; $i < 5; $i++) { 

                echo "
                <div class='product-tile'>
                    <img src='img/bag-1-front.jpg' alt='Bag 1' class='slider-product-img'>
                    <div class='slider-product-info'>
                        <h2 class='slider-product-title'>Fashion Overnight Bag</h2>
                        <p class='product-cost'>$ 200</p>
                    </div>
                </div>
                <div class='product-tile'>
                    <img src='img/bag-2-front.jpg' alt='Bag 2' class='slider-product-img'>
                    <div class='slider-product-info'>
                        <h2 class='slider-product-title'>Men's Fashion Bag</h2>
                        <p class='product-cost'>$ 150</p>
                    </div>
                </div>
                ";
            }
                
            ?>
        </div>
        <div class="banner-section">
            <div class="banner" style="background-image: url(img/banner-1.jpg);">
                <div class="banner-content">
                    <p class="banner-semi-title">New Arrivals</p>
                    <h1 class="banner-title">Season Training Shoes</h1>
                    <p class="banner-product-cost">Only from <span style="color: var(--accent-color);">79.88$</span></p>
                </div>
            </div>
            <div class="banner" style="background-image: url(img/banner-2.jpg);">
                <div class="banner-content" style="color: white;">
                    <p class="banner-semi-title">Top Product</p>
                    <h1 class="banner-title">Suitable Women Wear</h1>
                    <p class="banner-product-cost">Only from <span style="color: var(--accent-color);">79.88$</span></p>
                </div>
            </div>
        </div>
        <h1 class="product-grid-heading">Shop Shoes</h1>
        <div class="product-grid">
            <?php
            for ($i=0; $i < 5; $i++) { 

                echo "
                <div class='product-tile'>
                    <img src='img/shoe-1.jpg' alt='Shoe 1' class='slider-product-img'>
                    <div class='slider-product-info'>
                        <h2 class='slider-product-title'>Beyond Sky shoes</h2>
                        <p class='product-cost'>$ 190</p>
                    </div>
                </div>
                <div class='product-tile'>
                    <img src='img/shoe-2.jpg' alt='Shoe 2' class='slider-product-img'>
                    <div class='slider-product-info'>
                        <h2 class='slider-product-title'>Roller Skate</h2>
                        <p class='product-cost'>$ 132,00</p>
                    </div>
                </div>
                ";
            }
            ?>
        </div>
    </main>
    <?php require 'footer.php'?>
</body>
</html>