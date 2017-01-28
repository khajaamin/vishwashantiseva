$(document).ready(function () {
        $('a').click(function () {
            //removing the previous selected menu state
            $('ul').find('li.active').removeClass('active');
            //adding the state for this parent menu
            $(this).parents("li").addClass('active');

        });
    });