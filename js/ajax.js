$("#link_id a").click(function () {
    var navPage = $(this).attr('href');
    if(navPage!= "#")
    {
        $(document.body).addClass('hidden');
        $(document.body).fadeIn(1000);
        $(document.body).removeClass('hidden');
        $(document.body).load(navPage);
        //$("#disqus_thread").load();
        window.history.pushState({path:navPage},'',navPage);
    }else
    {
    }
    return false;
});
$(document).ready(function(){
$(".nav_link li a").on('click',function () {
    var nav = $(this).attr('href');
    if(nav!='#')
    {
        $(document.body).addClass('hidden');
        $(document.body).fadeIn(1000);
        $(document.body).removeClass('hidden');
        $(document.body).load(nav);	   
       
        window.history.pushState({path:nav},'',nav);		
    }  else
    {
       if ($(".dropdown-menu").is(":hidden"))
       {
           $(".dropdown-menu li a").css({
               transition: "0.5s all ease-in-out",
               WebkitTransition : "0.5s all ease-in-out",
               MozTransition    : "0.5s all ease-in-out",
               MsTransition     : "0.5s all ease-in-out",
               OTransition     : "0.5s all ease-in-out",
               display: "block",
               width: "100%",
               textAlign:"left",
               fontFamily: '"Raleway", sans-serif',
           });
               $(".dropdown-menu").slideDown('fast');

       } else
       {
           $(".dropdown-menu").slideUp('fast');
       }
        }
        
    return false;
});
});


