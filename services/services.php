<?php
$userName = "ranastar";
$userPass = "Db123456!";
$serverName = "localhost";
$database = "ranastar";
$defaultLang =  ['2'=>'en'];



if (isset($_POST['name'])) {
    echo 'Я получил запрос '.$_POST['name'];
    die();
}
?>




<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery-image {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #ccc;
        }
        .hidden {
            display: none;
        }
        .filter-button {
            cursor: pointer;
            padding: 5px 10px;
            margin: 5px;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .filter-active {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="isotope-layout" data-layout="masonry" data-sort="original-order">
        <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <?php
/*            // Ваши данные для фильтров
            $filters = ['all', 'filter1', 'filter2', 'filter3']; // Пример фильтров
            $activeFilter = 'all'; // Активный фильтр по умолчанию
            foreach ($filters as $filter) {
                $class = $filter === $activeFilter ? 'filter-active' : '';
                echo "<li class='filter-button $class' data-filter='$filter'>$filter</li>";
            }
            */?>
        </ul>

        <div class="gallery">
            <?php
/*            // Ваши изображения для галереи
            $images = [
                ['src' => 'img/1.jpg', 'filter' => 'filter1'],
                ['src' => 'img/2.jpg', 'filter' => 'filter2'],
                ['src' => 'img/3.jpg', 'filter' => 'filter1'],
                // Добавьте другие изображения с их фильтрами здесь
            ];
            foreach ($images as $image) {
                echo "<img src='{$image['src']}' class='gallery-image " . ($image['filter'] !== $activeFilter ? 'hidden' : '') . "' data-filter='{$image['filter']}'>";
            }
            */?>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработчик клика по кнопкам фильтра
        document.querySelectorAll('.filter-button').forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                // Показываем только изображения, соответствующие выбранному фильтру
                document.querySelectorAll('.gallery-image').forEach(image => {
                    if (filter === 'all' || image.getAttribute('data-filter') === filter) {
                        image.classList.remove('hidden');
                    } else {
                        image.classList.add('hidden');
                    }
                });
                // Помечаем выбранную кнопку как активную, а остальные - нет
                document.querySelectorAll('.filter-button').forEach(btn => {
                    btn.classList.remove('filter-active');
                });
                this.classList.add('filter-active');
            });
        });
    });
</script>

</body>
</html>
-->
