<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Kинотеатр "ПОБЕДА"</title>
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
                        <div class="navbar-wrapper-item"><a class="navbar-wrapper-item__link" href="#">Контакты</a></div>
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
                Контакты
            </h2>
            <div class="contacts-wrapper">
                <div class="contacts-item">
                    <h2 class="sub-title">
                        Адрес:
                    </h2>
                    <p class="desc">
                        241035, г. Брянск ул. Майской Стачки, 5
                    </p>
                </div>
                <div class="contacts-item">
                    <h2 class="sub-title">
                        Режим работы:
                    </h2>
                    <p class="desc">
                        Понедельник – воскресенье с 10.00 до 00.00
                    </p>
                </div>
                <div class="contacts-item">
                    <h2 class="sub-title">
                        Касса, бронирование билетов:
                    </h2>
                    <p class="desc">
                        +7 (4832) 51-51-82
                    </p>
                </div>
                <div class="contacts-item">
                    <h2 class="sub-title">
                        Почта:
                    </h2>
                    <p class="desc">
                        <a href="mailto:pobeda-32@yandex.ru">pobeda-32@yandex.ru</a>
                    </p>
                </div>
            </div>
            <iframe class="map" src="https://yandex.ru/map-widget/v1/?um=constructor%3AMMbOMfMYv5XeLMQ0eBPrBh_sHQS6Mt19&amp;source=constructor"
                width="100%" height="529" frameborder="0"></iframe>
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