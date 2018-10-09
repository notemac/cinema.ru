<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Кинотеатр "ПОБЕДА"</title>
</head>

<body>
    <header>
        <!-- НАВИГАЦИЯ -->
        <nav>
            <div class="container">
                <div class="navbar">
                    <div class="navbar-logo"></div>
                    <div class="navbar-wrapper">
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\index.php">Главная</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\timetable.php">Расписание</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\contacts.php">Контакты</a></div>
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="\about.php">О компании</a></div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- НАВИГАЦИЯ -->
    </header>
    <main>
        <div class="container">
            <div class="siema">
                <div class="siema-item"><img class="siema-item__img" src="./images/slider2.jpg" alt=""></div>
                <div class="siema-item"><img class="siema-item__img" src="./images/slider1.jpg" alt=""></div>
                <div class="siema-item"><img class="siema-item__img" src="./images/slider3.jpg" alt=""></div>
            </div>
            <!-- ФИЛЬМ -->
            <div class="movie-wrapper">
                <div class="movie-left">
                    <div class="movie-poster">
                        <img class="movie-poster__img" src="\img/films/<?=$film['poster']?>" alt="Не удалось загрузить постер">
                    </div>
                </div>
                <div class="movie-right">
                    <div class="movie-title"><?=$film['name']?></div>
                    <div class="movie-content-item">
                        <div class="movie-content-item-title">Производство:</div>
                        <div class="movie-content-item-desc"><?=$film['country']?></div>
                    </div>
                    <div class="movie-content-item">
                        <div class="movie-content-item-title">Жанр:</div>
                        <div class="movie-content-item-desc"><?=$film['genre']?></div>
                    </div>
                    <div class="movie-content-item">
                        <div class="movie-content-item-title">В ролях:</div>
                        <div class="movie-content-item-desc"><?=$film['actor']?></div>
                    </div>
                    <div class="movie-content-item">
                        <div class="movie-content-item-title">Описание:</div>
                        <div class="movie-content-item-desc"><?=$film['description']?></div>
                    </div>
                </div>
            </div>
            <!-- ФИЛЬМ -->
            <!-- КОММЕНТАРИИ -->
            <div class="comments" id="comments-block">
                <h2 class="title"> Комментарии: </h2>
                <form class="comments-form" method="post" action="\films.php?id=<?=@$_GET['id']?>#comments-block">
                    <input class="comments-input" type="text" name="comment" maxlength="500"  placeholder="Написать комментарий">
                    <button type="submit" class="button">Отправить</button>
                </form>

                <div class="comments-wrapper">
                <?php if (isset($comments)): ?>
                    <?php foreach($comments as $comment): ?> 
                        <div class="comments-item">
                            <?=$comment['text']?>
                        </div>
                    <?php endforeach ?> 
                <?php endif ?>
                </div>
            </div>
            <!-- КОММЕНТАРИИ -->
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="footer-wrapper">
                <div class="footer-item">
                    <h4 class="footer-item__title">Контакты</h4>
                    <p class="footer-item__desc">241050 Брянск, ул. Майской Стачки, 5
                        Кассы: (4832) 51-51-82</p>
                </div>
                <div class="footer-item">
                    <h4 class="footer-item__title">Меню</h4>
                    <div class="footer-nav">
                        <div class="footer-nav-item"><a class="footer-nav-item__link" href="\index.php">Главная</a></div>
                        <div class="footer-nav-item"><a class="footer-nav-item__link" href="\timetable.php">Расписание</a></div>
                        <div class="footer-nav-item"><a class="footer-nav-item__link" href="\contacts.php">Контакты</a></div>
                        <div class="footer-nav-item"><a class="footer-nav-item__link" href="\about.php">О компании</a></div>
                    </div>
                </div>
                <div class="footer-item">
                    <h4 class="footer-item__title">Описание</h4>
                    <p class="footer-item__desc">МБУК «ГОРОДСКОЙ ДВОРЕЦ КУЛЬТУРЫ И ИСКУССТВА»</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="./js/siema.min.js"></script>
    <script>
         // Инициализация слайдера с его настройками
         const mySiema = new Siema({
            duration: 500,
            perPage: 1,
            startIndex: 0,
            loop: true,
        });

        // Запускаем автопрокрутку каждый 3 секунды
        setInterval(() => mySiema.next(), 3000)
    </script>
</body>

</html>