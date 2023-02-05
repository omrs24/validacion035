jQuery('document').ready(function($){
    var menuBtn = $('.menu-icon'),
    menu=$('.navegacion ul');
    menuBtn.click(function(){
        if(menu.hasClass('mostrar')){
           menu.removeClass('mostrar');  
        }else{
       menu.addClass('mostrar'); 
        }
    });
});

