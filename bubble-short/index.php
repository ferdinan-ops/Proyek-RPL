<?php
echo "//bubble sorting";
$data = array(6, 5, 3, 1, 8, 7, 2, 4);
function bubble_sort($data)
{
    $n = count($data);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $n - 1; $j > $i; $j--) {
            if ($data[$j] < $data[$j - 1]) {
                $dummy = $data[$j];
                $data[$j] = $data[$j - 1];
                $data[$j - 1] = $dummy;
            }
        }
    }
    return $data;
}
print_r(bubble_sort($data));
