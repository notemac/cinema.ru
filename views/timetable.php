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
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="#">Расписание</a></div>
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
                <div class="siema-item"><img class="siema-item__img" src="\img/slider/slider1.jpg" alt=""></div>
                <div class="siema-item"><img class="siema-item__img" src="\img/slider/slider2.jpg" alt=""></div>
                <div class="siema-item"><img class="siema-item__img" src="\img/slider/slider3.jpg" alt=""></div>
            </div>
            <div class="timetable-title-wrapper">
                <h2 class="title" id="timetable-block">
                    Расписание кинотеатра 
                </h2>
                <form class="date-picker">
                        <input onchange="OnPickDate(event);" class="auth-input" type="date" value="<?=$date?>">
                </form>
             </div>
            <!-- СЕТКА С РАСПИСАНИЕМ -->
            <div class="grid">
                <?php foreach($seances as $seance): ?> 
                <div class="grid-item">
                    <div class="movie">
                        <div class="poster">
                            <a href="\films.php?id=<?=$seance['film_id']?>" target="_blank"><img src="\img/films/<?=$seance['poster']?>" class="poster-img" alt="Не удалось загрузить постер"></a>
                        </div>
                        <div class="movie-title_"><a href="\films.php?id=<?=$seance['film_id']?>" target="_blank"><?=$seance['film_name']?></a></div>
                        <div class="movie-genre"><?=$seance['genre']?></div>
                        <div class="movie-times">
                            <?php foreach($seance['time'] as $time): ?> 
                            <div class="movie-times__item"> <?=$time?> </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                
            </div>
            <!-- СЕТКА С РАСПИСАНИЕМ -->
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
        // Инициализация слайдера, с его настройками
         const mySiema = new Siema({
            duration: 500,
            perPage: 1,
            startIndex: 0,
            loop: true,
        });

        // Запускаем автопрокрутку каждый 3 секунды
        setInterval(() => mySiema.next(), 3000)
    </script>
    <script>
        function OnPickDate(event){
            if (event.target.value != '')
                window.location.href = './timetable.php?date='+ event.target.value + '#timetable-block';
        }
    </script>
</body>

</html>