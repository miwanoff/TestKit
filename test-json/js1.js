$( document ).ready(function() {
    $( "button" ).click(function() { // задаем функцию при нажатиии на элемент <button>
        $.getJSON( "test_html.json", function ( data, textStatus, jqXHR ) { // указываем url и функцию обратного вызова;
            let tests = [];
            for (let key in data ) {
                let ans1 = 1;
                let ans2 = 1;
                let ans3 = 1;
                let ans4 = 1;
                let ans5 = 1;
                tests.push('<div class="row tests z-depth-2"><div class="col s12">'
                + "<h4>" +key+ "</h4>"
                + "<p> <input name='group1' type='radio' id='test1' /><label for='test1'>" + data[key]['ans1'] + "</label></p>"
                + "<p> <input name='group1' type='radio' id='test1' /><label for='test2'>" + data[key]['ans2'] + "</label></p>"
                + "<p> <input name='group1' type='radio' id='test1' /><label for='test3'>" + data[key]['ans3'] + "</label></p>"
                + "<p> <input name='group1' type='radio' id='test1' /><label for='test4'>" + data[key]['ans4'] + "</label></p>"
                + "</div></div>");
            };
            $('<form/>', {
                'class': 'my-new-list',
                html: tests.join('')
            }).appendTo('.tests');
        })
    })
});