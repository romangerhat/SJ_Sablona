<?php
namespace main;
class Menu
{
    private $filePath = "source/menu.csv";
    function getMenuData(string $type): array
    {
        $isValid = $this->validateMenuType($type);
        if($isValid){
            if($type==="header"){
                try {
                    $subor = fopen($this->filePath,'r');
                    $menu = [];
                    while (($riadok = fgetcsv($subor)) !== false){
                        $menu[$riadok[0]] = [
                            'path' => $riadok[1],
                            'name' => $riadok[2]
                        ];
                    }
                } catch (\Exception $exception){
                    $menu = [
                        'home' => [
                            'name' => 'Domov',
                            'path' => 'index.php',
                        ]
                    ];
                }
            }
        }

        return $menu;
    }

    function printMenu(array $menu)
    {
        foreach ($menu as $menuName => $menuData) {
            echo '<li><a href="'.$menuData['path'].'">'.$menuData['name'].'</a></li>';
        }
    }

    function validateMenuType(string $type): bool
    {
        $menuTypes = [
            'header',
            'footer'
        ];

        if(in_array($type, $menuTypes)) {
            return true;
        } else {
            return false;
        }
    }


    function preparePortfolio(int $numberOfRows = 2, int $numberOfCols = 4): array
    {
        $portfolio = [];
        $colIndex = 1;

        for ($i = 1; $i <= $numberOfRows; $i++) {
            for($j = 1; $j <= $numberOfCols; $j++) {
                $portfolio[$i][] = $colIndex;
                $colIndex++;
            }
        }

        return $portfolio;
    }
}
function getMenuData(string $type): array
{
    $menu = [];

    if(validateMenuType($type)) {
        if($type === "header") {
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
        }
    }

    return $menu;
}

function printMenu(array $menu)
{
    foreach ($menu as $menuName => $menuData) {
        echo '<li><a href="'.$menuData['path'].'">'.$menuData['name'].'</a></li>';
    }
}

function validateMenuType(string $type): bool
{
    $menuTypes = [
        'header',
        'footer'
    ];

    if(in_array($type, $menuTypes)) {
        return true;
    } else {
        return false;
    }
}


function preparePortfolio(int $numberOfRows = 2, int $numberOfCols = 4): array
{
    $portfolio = [];
    $colIndex = 1;

    for ($i = 1; $i <= $numberOfRows; $i++) {
        for($j = 1; $j <= $numberOfCols; $j++) {
            $portfolio[$i][] = $colIndex;
            $colIndex++;
        }
    }

    return $portfolio;
}

?>