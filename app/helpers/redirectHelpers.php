<?php
/**
 * Copyright (c) All Rights Reserved.
 * Author : InnoZone Solutions
 * Team : Rudy Jordache  | Anderson Luiz | Dagoberto Pereira Jr
 *
 */

class redirectHelpers{

    static function go($url){
        return "<script> window.location.href='".ROOT.$url."'; </script>";
    }

}