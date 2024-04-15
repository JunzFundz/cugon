<?php
session_start();
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
                    <h4><?php echo $row["i_name"]; ?></h4>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. In ipsum ab unde molestiae soluta saepe. Itaque quas culpa architecto! Ex sed deleniti exercitationem saepe architecto? Dolor placeat porro facere error.
                    </p>
                    <button class="btn" style="width: 70%;" data-modal-target="order-modal" 
                    data-modal-toggle="order-modal"
                    data-user_id="<?php echo $_SESSION['user_id'] ?>"
                    data-price="<?php $row["i_price"] ?>"
                    data-food_name="<?php $row["i_name"] ?>"
                    >ORDER&nbsp;&nbsp;&nbsp;₱<?php echo number_format($row["i_price"]) ?></button>
                </div>
            <?php } ?>

        </div>
    </section>

    <section class="section__container event__container" id="event">
        <div class="event__content">
            <div class="event__image">
                <img src="https://scontent.fceb1-1.fna.fbcdn.net/v/t39.30808-6/429768637_809655987845645_5719273989111712910_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGitCHQ3Owdo8XKvby61rCutfHptNSb2WG18em01JvZYR4WfkPSe4_ZmVeq7TT2k23IiOVl1Ft8hVLIvuzSkPZQ&_nc_ohc=QJ3gMJIedicAX_jNrbl&_nc_ht=scontent.fceb1-1.fna&oh=00_AfAt5BgLF1GE-HBMthfL-nc0PMvwU_0HiOSDpv3oi3cTkA&oe=660D92F4" alt="event" />
            </div>
            <div class="event__details">
                <h3>Discover</h3>
                <h2 class="section__header">UPCOMING EVENTS</h2>
                <p class="section__description">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur fugiat accusamus laboriosam eveniet totam nulla eligendi numquam magni reiciendis, sed sapiente, commodi cumque quas debitis. Itaque modi asperiores repellendus distinctio?
                </p>
            </div>
        </div>
    </section>

    <section class="reservation" id="contact">
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
    </section>

    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__logo">
                <img src="assets/logo-white.png" alt="logo" />
            </div>
            <div class="footer__content">
                <p>
                    Welcome to Burger Company, where passion for exceptional food and
                    genuine hospitality come together. Our story is one of dedication to
                    crafting the perfect burger experience, from sourcing the finest
                    ingredients to delivering unparalleled taste in every bite.
                </p>
                <div>
                    <ul class="footer__links">
                        <li>
                            <span><i class="ri-map-pin-2-fill"></i></span>
                            MG Road, Bangalore, 500089
                        </li>
                        <li>
                            <span><i class="ri-mail-fill"></i></span>
                            info@burgerhouse.com
                        </li>
                    </ul>
                    <div class="footer__socials">
                        <a href="#"><i class="ri-facebook-circle-fill"></i></a>
                        <a href="#"><i class="ri-instagram-fill"></i></a>
                        <a href="#"><i class="ri-twitter-fill"></i></a>
                        <a href="#"><i class="ri-whatsapp-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2024 Web Design Mastery. All rights reserved.
        </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="../assets/animations.js"></script>
    <?php 
    include('load-modals.php');
    include('user-footer.php');
    ?>
</body>

</html>