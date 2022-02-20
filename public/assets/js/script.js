// "use strict";

// var path = location.pathname.split('/')
// var url = location.origin + '/' + path[1]

// $('ul.sidebar-menu li a').each(function() {
//     if($(this).attr('href').indexOf(url) !== -1) {
//         $(this).parent().addClass('active').parent().parent('li').addClass('active')
//     }
// })

// preview image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#foto").change(function() {
    readURL(this);
});



