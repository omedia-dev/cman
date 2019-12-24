<?php
if( !function_exists('is_super_admin') || !is_super_admin() ){
    exit('error');
}