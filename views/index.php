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
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="#">Главная</a></div>
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
                <div class="siema-item"><img class="siema-item__img" src="\img/slider/slider1.jpg" alt=""></div>
                <div class="siema-item"><img class="siema-item__img" src="\img/slider/slider2.jpg" alt=""></div>
                <div class="siema-item"><img class="siema-item__img" src="\img/slider/slider3.jpg" alt=""></div>
            </div>
            <h2 class="title">
                Победа – многофункциональное культурно-досуговое учреждение
            </h2>
            <div class="content-wrapper">
                <p class="content">
                    В настоящее время кинотеатр «Победа» является современным многофункциональным культурно-досуговым
                    центром, в здании кинотеатра осуществляет свою деятельность муниципальное бюджетное учреждение
                    культуры
                    «Городской Дворец культуры и искусства». Предметом деятельности, которого является оказание услуг
                    по
                    организации и проведению культурно-массовых мероприятий и культурного досуга.
                    Учреждения располагает двумя кинозалами и площадкой для проведения концертных, тематических,
                    корпоративных мероприятий. Залы оснащены современным видеопроекционным, звуковым и светотехническим
                    оборудованием.
                </p>
                <p class="content">
                    Здание кинотеатра интересно как сооружение периода перехода советской архитектуры от
                    конструктивизма к
                    ориентации на классическое наследие. Облик здания динамичный, его фасады имеют линии и плоскости
                    наклонные, горизонтальные, фронтальные и диагональные. Динамика усиливается контрастом ленточного
                    остекления галерей с глухими стенами залов.На базе учреждения работают профессиональные городские ансамбли, детские
                    хореографические студии, а также коллективы самодеятельного народного творчества.
                </p>
            </div>
            <h2 class="title">
                Кинотеатр, проверенный временем
            </h2>
            <div class="photos">
                <div class="photos-item">
                    <img class="photos-item__img" src="./img/index/1.jpg" alt="movie-building">
                </div>
                <div class="photos-item">
                    <img class="photos-item__img" src="./img/index/2.jpg" alt="movie-building">
                </div>
                <div class="photos-item">
                    <img class="photos-item__img" src="./img/index/3.jpg" alt="movie-building">
                </div>
                <div class="photos-item">
                    <img class="photos-item__img" src="./img/index/4.jpg" alt="movie-building">
                </div>
                <div class="photos-item">
                    <img class="photos-item__img" src="./img/index/5.jpg" alt="movie-building">
                </div>
                <div class="photos-item">
                    <img class="photos-item__img" src="./img/index/6.jpg" alt="people">
                </div>
            </div>
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
    <script src="\js/siema.min.js"></script>
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