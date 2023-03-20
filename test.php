<?php
$header = ["","",""];
$menu = [
    'home' => [
        'name' => 'Domov',
        'path' => 'index.php',
    ],
    'portfolio' => [
        'name' => 'Portfólio',
        'path' => 'portfolio.php',
    ],
    'qna' => [
        'name' => 'Q&A',
        'path' => 'qna.php',
    ],
    'kontakt' => [
        'name' => 'Kontakt',
        'path' => 'kontakt.php',
    ]
];
$f=  fopen('source/menu.csv','w');
fputcsv($f, $header);
foreach ($menu as $key => $item){
    $a = [$key, $item['path'], $item['name']];
    fputcsv($f,$a);
}
fclose($f);
?>

