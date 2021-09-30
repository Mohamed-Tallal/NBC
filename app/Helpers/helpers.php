<?php

function is_Active($route){
    return  request()->segment('2') == $route ? 'active' :'' ;
}
