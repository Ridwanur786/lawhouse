$(document).ready(function () {
    $(".btn_click").click(function (e) {
        e.preventDefault();
        var page = $(this).attr('href');
        if(page!="#"){
            $(document.body).addClass('hidden');
            $(document.body).fadeIn(1000);
            $(document.body).removeClass('hidden');
            $(document.body).load(page,'../scripts/disqus.php');
           // $("#disqus_thread").load(');
            window.history.pushState({path:page},'',page);
        }
        return false;
    });
});