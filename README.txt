 //1. регулярные выражения с подмаской

     // формат: dd-mm-yyyy
     $string = '21-11-2021';

     // год 2021($3), месяц 11($2), день 21($1)
     $pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

     // подмаски - $3 $2 $1 регулярного выражения
     $replacement = 'Год: $3, месяц: $2, день: $1';

     echo preg_replace($pattern, $replacement, $string);


 // 2. ЧПУ - человеко-понятный УРЛ

     ЧПУ:
     http://mvc/news/sport/123
     регул.выр:
     'news/([a-z]+)/([0-9]+)'

     не ЧПУ:
     http://mvc/news/?id=123&category=sport  -> $_GET

    // Делаем ЧПУ

    // получаем внутренний путь из внешнего согласно правилу
    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
