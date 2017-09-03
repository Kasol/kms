<?php
namespace Lang\Controller;
use Think\Controller;
class GetLangController extends Controller{
    public function getCurrentLang(){
        $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4); //只取前4位，这样只判断最优先的语言。如果取前5位，可能出现en,zh的情况，影响判断。
//         echo(preg_match("/zh-c/i", $lang)) ;
        
        if (preg_match("/zh-c/i", $lang))
            return "简体中文";
        else if (preg_match("/zh/i", $lang))
            return "繁體中文";
        else if (preg_match("/en/i", $lang))
            return "English";
        else if (preg_match("/fr/i", $lang))
            return "French";
        else if (preg_match("/de/i", $lang))
            return "German";
        else if (preg_match("/jp/i", $lang))
            return "Japanese";
        else if (preg_match("/ko/i", $lang))
            return "Korean";
        else if (preg_match("/es/i", $lang))
            return "Spanish";
        else if (preg_match("/sv/i", $lang))
            return "Swedish";
        else return $_SERVER["HTTP_ACCEPT_LANGUAGE"];
    }
}