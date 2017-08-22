<?php
function min_with_unique_key($array, $ID, $distance) {
    if (!is_array($array) || count($array) == 0) return false;
    
    $uniq_ids = array();
    foreach ($array as $h) {
        $uniq_ids[] = $h[$ID];
    }
    //$uniq_ids = array_values(array_unique($uniq_ids));
    $uniq_ids = array_unique($uniq_ids);
          
    $final_arr = array();
    $i = 0;
    foreach($uniq_ids as $kk => $uId){
        $min_distance = $array[$kk][$distance];
        $min_id = $array[$kk][$ID];
        foreach($array as $a) {
            if($uId == $a[$ID] && $a[$distance] < $min_distance) {
                $min_distance = $a[$distance];
                $min_id = $a[$ID];
            }
        }
        $final_arr[$i]['ID'] = $uId;
        $final_arr[$i]['distance'] = $min_distance;
        $i++;
    }
    return $final_arr;
}
?>
