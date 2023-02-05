function mostrar($id, $oc1, $oc2, $oc3,$oc4){
    var mostrar = document.getElementById($id),oc1 = document.getElementById($oc1),oc2 = document.getElementById($oc2), oc3 = document.getElementById($oc3), oc4 = document.getElementById($oc4);
    mostrar.classList.add("d-block");
    oc1.classList.remove("d-block");
    oc2.classList.remove("d-block");
    oc3.classList.remove("d-block");
    oc4.classList.remove("d-block");
    oc1.classList.add("d-none");
    oc2.classList.add("d-none");
    oc3.classList.add("d-none");
    oc4.classList.add("d-none");
   }
   $(".showpass1").on('click',function() {
       var $pwd = $(".pwd1");
       if ($pwd.attr('type') === 'password') {
           $pwd.attr('type', 'text');
       } else {
           $pwd.attr('type', 'password');
       }
   });
   $(".showpass2").on('click',function() {
       var $pwd = $(".pwd2");
       if ($pwd.attr('type') === 'password') {
           $pwd.attr('type', 'text');
       } else {
           $pwd.attr('type', 'password');
       }
   });
   //Revisa que las contrasenias coincidan
   $('.pwd2').on('input', function(e) {
       var pwd1 = $(".pwd1").val();
       var pwd2 = $(".pwd2").val();
       if(pwd1 != pwd2)
       {
           $('#lblpass').removeClass("d-none");
       }
       else
       {
           $('#lblpass').addClass("d-none");
       }
     });
   $('.pwd1').on('input', function(e) {
       var pwd1 = $(".pwd1").val();
       var pwd2 = $(".pwd2").val();
       if(pwd1 != pwd2)
       {
           $('#lblpass').removeClass("d-none");
       }
       else
       {
           $('#lblpass').addClass("d-none");
       }
     });
   /*
   $(document).ready(function(){ 
       var pws1 = $(".pwd1").value();
       var pws2 = $(".pwd2").value();
       if()
   }); 
   function mostrarsecciones($id, $oc1, $oc2, $oc3){
       var mostrar = document.getElementById($id),oc1 = document.getElementById($oc1),oc2 = document.getElementById($oc2), oc3 = document.getElementById($oc3);
       mostrar.classList.add("d-block");
       oc1.classList.remove("d-block");
       oc2.classList.remove("d-block");
       oc3.classList.remove("d-block");
       oc1.classList.add("d-none");
       oc2.classList.add("d-none");
       oc3.classList.add("d-none");
      }*/
   function salir()
   {
       window.location.replace('http://validacionnom035.com/formularios/login.php'); 
   }
           