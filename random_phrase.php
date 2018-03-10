<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
    $str = '{Пожалуйста|Просто}  сделайте так, чтобы это
                     {удивительное|крутое|простое} тестовое предложение 
                     {изменялось {быстро|мгновенно} случайным образом|менялось каждый раз}.';
                     
    //strripos — Возвращает позицию последнего вхождения подстроки без учета регистра
    //stripos — Возвращает позицию первого вхождения подстроки без учета регис
     while (stripos($str, "{") !== false){
        $close_position = stripos($str, "}"); 
        $buf_substing = substr($str, 0, $close_position);
        $start_position = strripos($buf_substing, "{");
        $buf_substing = substr($buf_substing, $start_position+1);
        $exploded_buf_mas = explode ("|", $buf_substing);
        $index_random = rand(0, count($exploded_buf_mas)-1);
        $length_replece = $close_position+1-$start_position;
        $str = substr_replace($str, $exploded_buf_mas[$index_random], $start_position, $length_replece);
    }
    
    echo($str);
    ?>
    
</body>
</html>