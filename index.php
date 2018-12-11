<!DOCTYPE HTML>
<html lang="uk">
<?php session_start();?>
<head>
    <meta charset="UTF-8">
    <title>Головна сторінка</title>
    <link href='style/main.css' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="content-wrapper">
        <header class="header">
            <div class="highest_row">
                <div>
                    <h1> Kinobase</h1>
                    <h2>Відкрий світ кіно разом з нами</h2>
                    <nav>
                        <!--Кіно Серіали Афіша Тексти РЕйтинги Програми і шоу -->
                        <a href=#>Кіно</a>
                        <a href=#>Серіали</a>
                        <a href=#>Афіша</a>
                        <a href=#>Тексти</a>
                        <a href=#>Рейтинги</a>
                        <a href=#>Програми і шоу</a>
                    </nav>
                </div>
            </div>
           <div class="forms">
                <form autocomplete="on" class="log_up" action="./scripts/reg.php" method="post" >
                    <input type="submit" value="Зареєструватись">
                </form>
                <form autocomplete="on" class="log_in" action="./scripts/log_in.php">
                    <input type="submit" value="Ввійти">
                </form>

                <form name='search' method='get' autocomplete="on" class="search">
                    <input type="search" aria-label="Пошук">
                    <input type="submit" value="Пошук">
                </form>
            </div>

            <h2>Рейтинг очікування</h2>
            <figure>
                <img src='image/header1.png' alt='Мадагаскар 3' />
                <figcaption>Мадагаскар 3. <br> На сайті з <time datetime='2018-06-06 00:01'> 6 червня</time>.</figcaption>
            </figure>
        </header>
        <div class="main_part">
            <aside class="aside_left">
                <section>
                    <h2> Obitel zla</h2>
                    <img src='image/obzla.png' alt='Обитель зла'>
                    <p> Tut text pro tizer obiteli zla chastina 5</p>
                </section>
                <section>
                    <h2> MAdagaskar</h2>
                    <img src='image/madagaskar.png' alt='Мадагаскар 3'>
                    <p> Tut text pro madagascar (no)</p>
                </section>
            </aside>


            <article class="article1">
                <h2> Що йде в кінотеатрах</h2>
                <div> 
                    <img src='image/dictator.png' alt='Диктатор'>
                    <main>
                        <span>
                            Тут текст про прем'єри <time datetime='2018-05-17 00:01'> 17 травня </time>
                            багато тексту, дуже багато тексту. Прям ну вде що неможна, стільки тексту. 
                            Прям ну вде що неможна, стільки тексту. Прям ну вде що неможна, стільки тексту.
                        </span>
                    </main>
                </div>
                <div> <img src='image/stark.png' alt='Старк'>
                    <main> 
                        <span>
                            Тут текст про прем'єри <time datetime='2018-05-03 00:01'> 3 травня </time>
                            багато тексту, дуже багато тексту. Прям ну вде що неможна, стільки тексту. 
                            Прям ну вде що неможна, стільки тексту. Прям ну вде що неможна, стільки тексту.
                        </span>
                    </main>
                </div>
            </article >
            <article class="article2">
                <h2>Poglat hladachiv</h2>
                <p> Tut text pro ce vse</p>
            </article>
            <article class="article3">
                <h2> Новини серіалів</h2>
                <div> <img src='image/dictator.png' alt='Диктатор'>
                    <main>                               
                        <span>
                            Тут текст Девіда Шор про фінал Доктора Хауса.багато тексту, дуже багато тексту. Прям ну вде що неможна, стільки тексту. 
                            Прям ну вде що неможна, стільки тексту.
                        </span> 
                    </main>
                </div>
                <div> <img src='image/stark.png' alt='Старк'>
                    <main> 
                        <span>
                            Тут текст Девіда Моррісса про роль губернатора.
                            багато тексту, дуже багато тексту. Прям ну вде що неможна, стільки тексту. 
                            Прям ну вде що неможна, стільки тексту. Прям ну вде що неможна, стільки тексту.
                        </span> 
                    </main>
                </div>
            </article>

            <aside class = aside_right>
                <div>
                    <h2>П'ять найпопулярніших фільмів</h2>
                    <ol>
                        <?php require './scripts/top5.php';?>
                    </ol>
                </div>
                <div>
                    <h2>П'ять випадкових фільмів</h2>
                    <ol>
                    <?php require './scripts/rand5.php';?>
                    </ol>
                </div>

                <!--<div>
                    <h2>Vupadkovi filmu</h2>
                    <figure>
                        <img src='image/morboy.png' alt='Морський бій'>
                        <figcaption>Морський бій</figcaption>
                    </figure>
                </div>-->
            </aside>
        </div>
        <footer class="footer">
            <nav>
                <ul>
                    <p>Фільми</p>
                    <li><a href=#>База фільмів</a></li>
                    <li><a href=#>Афіша</a></li>
                    <li> <a href=#>В кінотеатрах</a></li>
                    <li><a href=#>Скоро</a></li>
                    <li><a href=#>Аніме</a></li>
                </ul>
                <ul>
                    <p>Люди</p>
                    <li> <a href=#>Актори</a></li>
                </ul>
                <ul>
                    <p>Мультимедіа </p>
                    <li><a href=#>Трейлери</a></li>
                    <li><a href=#>Фото</a></li>
                    <li><a href=#>Шпалери</a></li>
                    <li> <a href=#>Саундтреки</a></li>
                </ul>
                <ul>
                    <p> Спілкування </p>
                    <li> <a href=#>Форум</a></li>
                </ul>
                <ul>
                    <p>Рейтинги </p>
                    <li><a href=#>Кращі фільми</a></li>
                    <li><a href=#>Box Office</a></li>
                </ul>
                <ul>
                    <p> Новини </p>
                    <li> <a href=#>Новини кіно</a></li>
                </ul>
                <ul>
                    <p>Користувачі </p>
                    <li> <a href=#>Реєстрація</a></li>
                    <li><a href=#>Зайти на сайт</a></li>
                </ul>
                <ul>
                    <p> Контакти </p>
                    <li> <a href=#>Форма зворотного зв'язку</a></li>
                    <li><a href=#>Реклама на kinobase</a></li>
                </ul>
            </nav>
        </footer>
    </div>
</body>

</html>