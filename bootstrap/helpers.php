<?php

function route_class()
{
    \Log::info(Route::currentRouteName());
    return str_replace('.','-',Route::currentRouteName());
}
