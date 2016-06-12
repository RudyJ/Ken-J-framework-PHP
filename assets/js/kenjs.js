/*
 * Copyright (c) All Rights Reserved.
 * Author : InnoZone Solutions
 * Team : Rudy Jordache  | Anderson Luiz | Dagoberto Pereira Jr
 *
 */

/**
 * Created by Rudy on 11/06/2016.
 */

$(function(){
    var base = window.location.pathname;

    $(window).load(function(){
        var url = $(".kenjsSRC").attr("src");
        var explode = url.split("/");
        delete explode[0];
        var implode = explode.join("/");
        var res = implode.replace("/", "");
        $(".kenjsSRC").attr("src", base+res);

        var url = $(".kenjsHREF").attr("href");
        var explode = url.split("/");
        delete explode[0];
        var implode = explode.join("/");
        var res = implode.replace("/", "");
        $(".kenjsHREF").attr("href", base+res);
    });

});
