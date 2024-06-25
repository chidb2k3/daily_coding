<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function swap(&$a, &$b) {
        $tam = $a;
        $a = $b;
        $b = $tam;
    }
    function findMedianSortedArrays($nums1, $nums2) {
        $arr =  array_merge($nums1, $nums2);
        for ($i= 0; $i < count($arr)-1; $i++) {
            for ($j= $i+1; $j < count($arr); $j++) {
               if($arr[$j]>$arr[$i]){
                $this->swap($arr[$j], $arr[$i]);
               }
            }
        }
        if(count($arr)%2 != 0){
            return $arr[count($arr)/2];
        }else{
            $t = count($arr)/2;
            return ($arr[$t]+$arr[$t-1])/2;
        }

        
    }
}
$s = new Solution();
echo $s->findMedianSortedArrays([1,3], [2]);

?>