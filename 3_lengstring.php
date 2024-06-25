<?php
// Given a string s, find the length of the longest 
// substring
//  without repeating characters.

 

// Example 1:

// Input: s = "abcabcbb"
// Output: 3
// Explanation: The answer is "abc", with the length of 3.
// Example 2:

// Input: s = "bbbbb"
// Output: 1
// Explanation: The answer is "b", with the length of 1.
// Example 3:

// Input: s = "pwwkew"
// Output: 3
// Explanation: The answer is "wke", with the length of 3.
// Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.
 

// Constraints:

// 0 <= s.length <= 5 * 104
// s consists of English letters, digits, symbols and spaces.
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function in($s,$a){
        for($i= 0;$i<strlen($s);$i++){
            if($a==$s[$i]){
                return true;
            }
        }
        return false;
    }
    function lengthOfLongestSubstring($s) {
        if(strlen(($s))==0){
            return 0;
        }
        $str="";
        $max = 1;
        $stop = false;
        for ($i = 0; $i < strlen($s)-1; $i++) {
            $str = "";
            $str.= $s[$i];
            // echo $str;
            for ($j = $i+1; $j < strlen($s); $j++) {
               if($this->in($str,$s[$j])==1){
                $l = strlen($str);
                if($l>$max){
                    $max = $l;
                    // echo "\nmax: ".$max;
                }
                break;
               }else{
                if($j==strlen($s)-1){
                    // echo "phần tử cuối : ".$s[strlen($s)-1];
                    $str.=$s[$j];
                    $l = strlen($str);
                    if($l>$max){
                        $max = $l;
                        // echo "\ngap cuoi: ".$str." max: ".$max;
                    }
                    $stop = true;
                    break;

                }
                $str.=$s[$j];
                // echo "\nchuoi hien tai: ".$str;
               }

            }
            if($stop){
                break;
            }
        }
        return $max;
    }
    
}
$c = new Solution();
echo $c->lengthOfLongestSubstring("abba");
// echo $c->in("abc", "d")

 ?>