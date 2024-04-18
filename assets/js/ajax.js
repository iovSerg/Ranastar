
function filterSelection(c) {
    console.log(c);
    $.ajax({
        type: "POST",
        url: 'index.php',
        dataType: 'json',
        data: { dog_id : c},
        success: function(response) {

            var flag = true;
            response.forEach(function (item) {
                if (item && 'country' in item) {
                    flag = false;
                }
            })

            flag ?  $('#responseContainer').empty() : $('#responseContainerGraduates').empty();

            // Проходим по каждому элементу в массиве response и создаем соответствующую HTML-структуру
            response.forEach(function(item) {
                var portfolioItem = $('<div >', {
                    class: 'col-lg-4 col-md-6 portfolio-item isotope-item filter-' + item.filterClass + (item.isActive ? ' active' : '')
                });

                var img = $('<img>', {
                    src: item.src,
                    class: 'img-fluid',
                    alt: ''
                });

                var portfolioInfo = $('<div>', {
                    class: 'portfolio-info'
                });

                var h4 = flag ? $('<h4>').text(item.title) : $('<h4>').text(item.title + '\n' + item.city);

                var a = $('<a>', {
                    href: item.src,
                    'data-gallery': 'portfolio-gallery-' + item.filterClass,
                    class: 'glightbox preview-link'
                }).append($('<i>', {
                    class: 'bi bi-zoom-in'
                }));

                portfolioInfo.append(h4, a);
                portfolioItem.append(img, portfolioInfo);

                flag ?  $('#responseContainer').append(portfolioItem) : $('#responseContainerGraduates').append(portfolioItem);

            });

        }
    });
}



function filterSelectionEX(c) {
    console.log(c);
    $.ajax({
        type: "POST",
        url: 'index.php',
        dataType: 'json',
        data: { exhibitions : c},
        success: function(response) {
            $('#responseContainerEX').empty();


            var firstPortfolioItem = $('<div>', {
                class: 'col-lg-4 col-md-6 portfolio-item isotope-item filter-' + response[0].title
            });

            let text = response[0].article; // Получаем значение article из response
            let paragraphs = text.split(/\r?\n/); // Разбиваем текст на абзацы по символам новой строки
            var h4First = $('<h4>'); // Создаем новый элемент h4

            paragraphs.forEach(function(paragraph) {
                h4First.append($('<p>').text(paragraph)); // Добавляем каждый абзац в элемент h4
            });



            firstPortfolioItem.append(h4First);


            $('#responseContainerEX').append(firstPortfolioItem);


            response.forEach(function(item, index) {
                if (index !== 0) { // Пропускаем первый элемент, так как его уже добавили выше
                    var portfolioItem = $('<div>', {
                        class: 'col-lg-4 col-md-6 portfolio-item isotope-item filter-' + item.filterClass + (item.isActive ? ' active' : '')
                    });

                    var img = $('<img>', {
                        src: item.src,
                        class: 'img-fluid',
                        alt: ''
                    });

                    var portfolioInfo = $('<div>', {
                        class: 'portfolio-info'
                    });

                    var h4 = $('<h4>').text(item.title);

                    var a = $('<a>', {
                        href: item.src,
                        'data-gallery': 'portfolio-gallery-' + item.filterClass,
                        class: 'glightbox preview-link'
                    }).append($('<i>', {
                        class: 'bi bi-zoom-in'
                    }));

                    portfolioInfo.append(h4, a);
                    portfolioItem.append(img, portfolioInfo);
                    $('#responseContainerEX').append(portfolioItem);
                }
            });


        }
    });
}