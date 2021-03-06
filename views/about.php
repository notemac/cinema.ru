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
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="#">О компании</a></div>
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
                О компании
            </h2>
            <p class="desc">
                Учреждения культуры, оказывающие услуги на базе здания кинотеатра «Победа»:
            </p>
            <h2 class="title">
                Основные направления деятельности учреждения:
            </h2>
            <ul class="list">
                <li class="list-item">содействие сохранению и приумножению художественных традиций;</li>
                <li class="list-item">развитие клубных формирований, любительских объединений, коллективов
                    самодеятельного творчества,
                    профессиональных творческих коллективов;</li>
                <li class="list-item">повышение культурного уровня населения;</li>
                <li class="list-item">организация и проведение культурно-массовых мероприятий;</li>
                <li class="list-item">осуществление проектов кинообслуживания, кинопоказов.</li>
            </ul>
            <p class="desc">
                С 2015 года учреждение работает на базе здания кинотеатра «Победа» в связи с чем в кинотеатре стали
                регулярными не только кинопоказы, но и концерты, фестивали, детские праздники, тематические выставки и
                другие мероприятия.
            </p>
            <p class="desc">
                МБУК «Городской Дворец культуры и искусства» создано в 2012 году.
            </p>
            <h2 class="title">
                На базе учреждения работают одни из лучших творческих коллективов города Брянска:
            </h2>
            <ul class="list">
                <li class="list-item">городской инструментальный ансамбль «Пересвет» – руководитель Вислобоков В. Г.;</li>
                <li class="list-item">городской инструментальный ансамбль «Фестиваль» – руководитель Мирмов Б. З.;</li>
                <li class="list-item">литературная студия – руководитель Черникова Е. А.</li>
            </ul>
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