<?php
// You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order, and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

// You may assume the two numbers do not contain any leading zero, except the number 0 itself.



// Example 1:


// Input: l1 = [2,4,3], l2 = [5,6,4]
// Output: [7,0,8]
// Explanation: 342 + 465 = 807.
// Example 2:

// Input: l1 = [0], l2 = [0]
// Output: [0]
// Example 3:

// Input: l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
// Output: [8,9,9,9,0,0,0,1]


// Constraints:

// The number of nodes in each linked list is in the range [1, 100].
// 0 <= Node.val <= 9
// It is guaranteed that the list represents a number that does not have leading zeros.

//Definition for a singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{

   
    public function addTwoNumbers($l1, $l2)
    {
        
        $l3 = new ListNode(0);
        $current = $l3;
        $carry = 0;
        while($l1 !== null || $l2 !== null){
            $sum = $carry + (($l1 !== null) ? $l1->val : 0) + (($l2 !== null) ? $l1->val : 0);
            $carry  = intdiv($sum, 10);
            $current->next = new ListNode($sum % 10);
            if ($l1 !== null) $l1=$l1 -> next;
            if ($l2 !== null) $l2=$l2->next;
            $current=$current->next;
        }
        if($carry > 0){
            $current->next = new ListNode($carry);
        }
        return $l3->next;

    }

}

// Helper function to create a linked list from an array
function createLinkedList($arr) {
    $dummyHead = new ListNode(0);
    $current = $dummyHead;
    foreach ($arr as $val) {
        $current->next = new ListNode($val);
        $current = $current->next;
    }
    return $dummyHead->next;
}

// Helper function to print a linked list
function printLinkedList($node) {
    while ($node !== null) {
        echo $node->val;
        if ($node->next !== null) {
            echo " -> ";
        }
        $node = $node->next;
    }
    echo "\n";
}
$slu = new Solution();

// Example usage
$l1 = createLinkedList([2, 4, 3]);
$l2 = createLinkedList([5, 6, 4]);
$result = $slu->addTwoNumbers($l1, $l2);
printLinkedList($result); // Output: 7 -> 0 -> 8

$l1 = createLinkedList([0]);
$l2 = createLinkedList([0]);
$result = $slu->addTwoNumbers($l1, $l2);
printLinkedList($result); // Output: 0

$l1 = createLinkedList([9, 9, 9, 9, 9, 9, 9]);
$l2 = createLinkedList([9, 9, 9, 9]);
$result = $slu->addTwoNumbers($l1, $l2);
printLinkedList($result); // Output: 8 -> 9 -> 9 -> 9 -> 0 -> 0 -> 0 -> 1
?>