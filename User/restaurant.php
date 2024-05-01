<?php
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header('location: ../database/logout.php');
} else {
    include('user-header.php');
    include('../data/user-load-info.php');
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="../src/restaurant.css" />
        <title>Cugon Restaurant</title>
    </head>

    <body>
        <header class="header">
            <nav>

            </nav>
            <div class="section__container header__container" id="home">
                <div class="header__image">
                    <!-- <img src="https://scontent.fceb1-2.fna.fbcdn.net/v/t39.30808-6/430075913_813148294163081_3947651403526788231_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEG7SCLWR_FLadV0K07Kl42HHXp4l8ldOEcdeniXyV04ZCtafAhtSdkgGD1RxgFJwL_YQgspoSl1y9lrTg3_Mc3&_nc_ohc=PPpRwXIK000AX9YadIl&_nc_ht=scontent.fceb1-2.fna&oh=00_AfCZiPSThwGjzIWVqBvwg3q9QW-zzq1kMXWAO3yqq2suEw&oe=660D78E9" alt="header" /> -->
                </div>
                <div class="header__content">
                    <h2>IT IS GOOD TIME FOR THE GREATE TASTE OF CUGON RESTAURANT</h2>
                    <h1>CUGON<br /><span>RESTAURANT</span></h1>
                </div>
            </div>
        </header>

        <section class="section__container order__container" id="menu">
            <h3>GRAB YOURS NOW!</h3>
            <h2 class="section__header">CHOOSE & ENJOY</h2>
            <p class="section__description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero obcaecati assumenda quam eligendi error architecto quod incidunt nobis. Labore atque incidunt commodi facere. Suscipit, culpa aspernatur voluptas incidunt repellendus voluptatem.
            </p>
            <div class="order__grid">

                <?php foreach ($result4 as $row) { ?>
                    <div class="order__card">
                        <img src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="order" />
                        <h4><?php echo htmlspecialchars($row["i_name"]); ?></h4>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. In ipsum ab unde molestiae soluta saepe. Itaque quas culpa architecto! Ex sed deleniti exercitationem saepe architecto? Dolor placeat porro facere error.
                        </p>
                        <button class="btn order-btn--" style="width: 70%;" data-modal-target="order-modal" data-modal-toggle="order-modal" data-user_id="<?php echo htmlspecialchars($_SESSION['user_id']) ?>" data-price="<?php echo htmlspecialchars($row["i_price"]) ?>" data-food_name="<?php echo htmlspecialchars($row["i_name"]) ?>">ORDER&nbsp;&nbsp;&nbsp;₱<?php echo number_format(htmlspecialchars($row["i_price"])) ?></button>
                    </div>
                <?php } ?>

            </div>
        </section>

        <section class="section__container event__container" id="event">
            <div class="event__content">
                <div class="event__image">
                    <img src="../images/sections2.jpg" alt="event" />
                </div>
                <div class="event__details">
                    <h3>Discover</h3>
                    <h2 class="section__header">UPCOMING EVENTS</h2>
                    <p class="section__description">
                        Order three and get four free drinks!
                    </p>
                </div>
            </div>
        </section>

        <!-- <section class="reservation" id="contact">
            <div class="section__container reservation__container">
                <h3>RESERVATION</h3>
                <h2 class="section__header">BOOK YOUR TABLE</h2>
                <form action="/">
                    <input type="text" placeholder="NAME" />
                    <input type="email" placeholder="EMAIL" />
                    <input type="date" placeholder="DATE" />
                    <input type="time" placeholder="TIME" />
                    <input type="number" placeholder="PEOPLE" />
                    <button class="btn" type="submit">FIND TABLE</button>
                </form>
            </div>
        </section> -->

        <footer class="footer">
            <div class="section__container footer__container">
                <div class="footer__logo">
                    <img src="../images/logo.jpg" alt="logo" style="border-radius: 50%;"/>
                </div>
                <div class="footer__content">
                    <p>
                    Welcome to Cugon Bamboo Resort, where tranquility and nature intertwine to offer you an unforgettable escape. Our story is one of dedication to creating an oasis of serenity, from our eco-conscious design to our warm hospitality. Immerse yourself in the lush greenery, relax in our bamboo-inspired accommodations, and savor the harmony between comfort and nature in every moment of your stay.
                    </p>
                    <div>
                        <ul class="footer__links">
                            <li>
                                <span><i class="ri-map-pin-2-fill"></i></span>
                                Pangalaykayan Bindoy Negros Oriental
                            </li>
                            <li>
                                <span><i class="ri-mail-fill"></i></span>
                                cugonbambooresort@gmail.com
                            </li>
                        </ul>
                        <div class="footer__socials">
                            <a href="https://www.facebook.com/cugonofficial"><i class="ri-facebook-circle-fill"></i></a>
                            <a href="#"><i class="ri-instagram-fill"></i></a>
                            <a href="#"><i class="ri-twitter-fill"></i></a>
                            <a href="#"><i class="ri-whatsapp-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bar">
                Copyright © 2024 CugonBambooResort. All rights reserved.
            </div>
        </footer>

        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="../assets/animations.js"></script>
        <?php
        include('load-modals.php');
        include('user-footer.php');
        ?>
    <?php } ?>