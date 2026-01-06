$('#menu_mobile').on('click', function(){
    $('.menu_mobile_main').css('display', 'block');
});
$('.close').on('click', function(){
    $('.menu_mobile_main').css('display', 'none');
});

function brModal(id, name){
    $('#id_serv').val(id);

    $('#name_span').html(name);
}

function order(id){
    $('#id_order').val(id);
}

function test(id){
    
}