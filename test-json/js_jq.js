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
            //     // указываем url и функцию обратного вызова;
            //     let tests = [];
            //     let qstr = "";

            //     let group_number = 0;
            //     let test_id = 0;
            //     for (let key in data) {
            //         let answ_number = 0;
            //         qstr +=
            //             '<div class="row tests z-depth-2"><div class="col s12">' +
            //             "<h4>" +
            //             key +
            //             "</h4>";
            //         for (let k in data[key]) {
            //             qstr +=
            //                 "<p> <input name='group" +
            //                 group_number +
            //                 "' type='radio' id='test" +
            //                 test_id +
            //                 "' /><label for='test" +
            //                 test_id +
            //                 "'>" +
            //                 k +
            //                 "</label></p>";
            //             answ_number++;
            //             test_id++;
            //         }
            //         qstr += "</div></div>";
            //         group_number++;
            //     }
            //    // tests.push(qstr);
            //     $("<form>", {
            //         class: "my-new-list",
            //         html: qstr
            //     }).appendTo(".tests");
        });
    });
});
