<?php

//$input_file_path = "../EURUSD_Candlestick_4_h_BID_01.01.2000-18.11.2019.csv";
//$input_file_path = "./data/data.csv";
if ($_REQUEST['file'] ?? null) {
    if (file_exists($_REQUEST['file']))
        $input_file_path = $_REQUEST['file'];
} else {
    echo "File nichte gefunden!";
    header('Location: ?file=./data/data.csv');
    die;
}

/**
 * @var string $separator e.g. ";" | "\t" | ","
 */
$separator = ",";


//include_once "Candle.php";
//include_once "functions.php";
//include_once "my_functions.php";


#$number_of_lines = number_of_lines_of_file($input_file_path);
$filesize = filesize($input_file_path) / 1000000;
if (ini_get('memory_limit') < $filesize) {
    die("Memory Limit (" . ini_get('memory_limit') . ") reicht nicht aus!\n");
}

if (!file_exists($input_file_path))
    die("Input file not found! Path invalid? \n");

$lines = [];
$rows = file($input_file_path);
$number_of_lines = count($rows);
for ($index = 0; $index < $number_of_lines; $index++) {
    if ($index == 0) {
        $titles = explode($separator, $rows[$index]);
    } else {
        $fields = explode($separator, $rows[$index]);
        $lines[] = $fields;
    }
}

//var_dump($result_a);
// conclusion / output
$ti = 0;
$output_columns1 = [
//    ['title' => $titles[$ti++]],
//    ['title' => $titles[$ti++]],
//    ['title' => $titles[$ti++]],
//    ['title' => $titles[$ti++]],
//    ['title' => $titles[$ti++]],
//    ['title' => $titles[$ti++]],
];
foreach ($titles as $k => $v) {
    $output_columns1[] = ['title' => $titles[$k]];
}
$output_data1 = [
//    ["Pattern A", $matches['a'], $result_a['case_a'], $result_a['case_b'], $result_a['case_c'],],
//    ["Pattern B", $matches['b'], $result_b['case_a'], $result_b['case_b'], $result_b['case_c'],],
];
//foreach ($pattern as $k => $v) {
//    $output_data1[] = [$pattern_title[$k], $matches[$k], $result[$k][0], $result[$k][1], $result[$k][2], $result[$k][3]];
//}
foreach ($lines as $k => $v) {
    $output_data1[] = $lines[$k];
}

$output_columns2 = [
//    ['title' => "0"],
//    ['title' => "1"],
//    ['title' => "2"],
//    ['title' => "3"],
//    ['title' => "Durchschnitt 1-3"],
//    ['title' => "Trend"],
];
// Variable als leeres Array initialisieren
$output_data2 = [];
//foreach ($match_details as $k => $v) {
//    // Variable als leeres Array initialisieren / zurücksetzen
//    $zeile = [];
//    foreach ($v as $vK => $vV) {
//        $zeile = $vV;
//        // $zeile wird an $output_data2 als letztes Element angehängt
//        $output_data2[$k][] = $zeile;
//    }
//}


$json_columns1 = json_encode($output_columns1);
$json_data1 = json_encode($output_data1);
$json_columns2 = json_encode($output_columns2);
$json_data2 = json_encode($output_data2);
include "./html.php";

