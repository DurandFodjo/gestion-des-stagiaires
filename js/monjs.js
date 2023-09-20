$(function(){
    //Afficher l'ancien pwd lors de l'event hover sur l'icone showlastpwd

    var txtlastPwd=$('.lastpwd');

    $('.showlastpwd').hover(
        fnOver, function () {
            txtlastPwd.attr(name,'type', value,'text');
        },
        fnOut, function () {
            txtlastPwd.attr(name,'type', value,'password');
        }
    )
})