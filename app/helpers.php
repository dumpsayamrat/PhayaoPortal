<?php
/**
 * Created by PhpStorm.
 * User: 56023_000
 * Date: 7/11/2015
 * Time: 05:22
 */
function getDays($links){
    $times = array("created_at","updated_at");
    foreach($links as $link){
        for($i = 0;$i < sizeof($times);$i++){
            $strDate = $link->$times[$i];
            $strYear = date("Y",strtotime($strDate))+543;
            $strMonth= date("n",strtotime($strDate));
            $strDay= date("j",strtotime($strDate));
            $strHour= date("H",strtotime($strDate));
            $strMinute= date("i",strtotime($strDate));
            $strSeconds= date("s",strtotime($strDate));
             $strMonthCut = Array(
                 "",
                 "มกราคม",
                 "กุมภาพันธ์",
                 "มีนาคม",
                 "เมษายน",
                 "พฤษภาคม",
                 "มิถุนายน",
                 "กรกฎาคม",
                 "สิงหาคม",
                 "กันยายน",
                 "ตุลาคม ",
                 "พฤศจิกายน",
                 "ธันวาคม"
             );
            $strMonthThai=$strMonthCut[$strMonth];
            $link[$times[$i].'_new']="$strDay $strMonthThai $strYear";
        }
    }
    return $links;
}
