$(document).ready(function () {
    $("button").click(function () {
        // задаем функцию при нажатиии на элемент <button>
        $.getJSON("test_html.json", function (data, textStatus, jqXHR) {
            $.each(data, function (i, field) {
                $("div.tests").append('<div class="col s12" id="'+ i +'">');
                $("div#"+i+".col.s12").append("<h4>" + i + "</h4>");
                $.each(field, function (k, v) { 
                    $("div#"+i+".col.s12").append("<p>" + k + "</p>");
                    $("div#"+i+".col.s12").append("<p>" + v + "</p>");
                });
            });           
        });
    });
});
