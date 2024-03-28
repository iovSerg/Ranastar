<section id="portfolio" class="portfolio">
    <div class="container section-title" data-aos="fade-up">
        <?php echo $db->GetText('GALLARY_TITLE');?>
    </div>

    <div class="container">

        <div class="isotope-layout"  data-layout="masonry"  data-sort="original-order">

            <ul class="portfolio-filters isotope-filters"  data-aos="fade-up" data-aos-delay="100">
                <?php
                // Ассоциативный массив, где ключ - класс фильтра, значение - название фильтра

                $filters = array(

                );
                $portfolioItems = array(

                );


                foreach ($dogs as $item) {

                    if(strlen($item->GetGender())>0)
                    {
                        $filters[".filter-" . strtolower($item->GetName())] = $item->GetName();

                        foreach ($item->GetPaths() as $path) {
                            $portfolioItems[] = array(
                                "src" => $path,
                                "title" => $item->GetFullName(), // Исправлено на вызов метода GetFullName()
                                "filterClass" => $item->GetName()
                            );
                        }
                    }
                }

                $flag = false;

                foreach ($filters as $filter => $label) {



                    if($flag === false)
                    {
                        $flag = true;
                        $activeFilter = $label;
                        $activeClass = "filter-active";
                    }
                    else $activeClass ="";


                    echo "<li data-filter=\"  $filter  \" class=\"$activeClass\">$label</li>";
                }

                ?>


            </ul>


            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php
                foreach ($portfolioItems as $item) {
                    $filterClass = strtolower($item['filterClass']); // Приводим к нижнему регистру класс фильтра
                    $isActiveClass = $filterClass === strtolower($activeFilter) ? 'active' : ''; // Проверяем, соответствует ли класс фильтра классу текущего элемента


                    echo "<div  class=\"col-lg-4 col-md-6 portfolio-item isotope-item filter-{$filterClass} {$isActiveClass}\">";
                    echo "<img src=\"{$item['src']}\" class=\"img-fluid\" alt=\"\">";
                    echo "<div class=\"portfolio-info\">";
                    echo "<h4>{$item['title']}</h4>";
                    echo "<a href=\"{$item['src']}\" data-gallery=\"portfolio-gallery-{$filterClass}\" class=\"glightbox preview-link\"><i class=\"bi bi-zoom-in\"></i></a>";
                    echo "</div>";
                    echo "</div>";

                }
                ?>
            </div>


        </div>
    </div>


    </div>

</section>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        function filterSelection(c) {
            var x, i;

            x = document.getElementsByClassName("column");

            if (c == "all") c = "";
            // Добавить класс "show" (display:block) к фильтрованным элементам, и извлеките класс "show" из элементов, которые не выбраны
            for (i = 0; i < x.length; i++) {
                RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) AddClass(x[i], "show");
            }
        }

        // Показать отфильтрованные элементы
        function AddClass(element, name) {


            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Скрыть элементы, которые не выбраны
        function RemoveClass(element, name) {


            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Добавить активный класс к текущей кнопке (выделите ее)
        // var btnContainer = document.getElementById("myBtnContainer");
        // var btns = btnContainer.getElementsByClassName("btn");
        // for (var i = 0; i < btns.length; i++) {
        //     btns[i].addEventListener("click", function(){
        //         var current = document.getElementsByClassName("active");
        //         current[0].className = current[0].className.replace(" active", "");
        //         this.className += " active";
        //     });
        // }
        /*$('body').on('click', '.filter', function() {


            // Получаем имя кнопки
            var buttonName = $(this).data('name');

            // Создаем объект данных для отправки на сервер
            var dataToSend = {
                button: buttonName // Добавляем имя кнопки к данным
                // Добавьте другие данные, если необходимо
            };

            // Отправляем AJAX-запрос на сервер
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: { filter: buttonName },
                success: function(data){
                    $('#gallery').html(data);
                }
            });
        });*/
        console.log('DOM готов');
    });


</script>