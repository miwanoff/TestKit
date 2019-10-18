<?php
header('Content-Type: application/json; charset=utf-8');
$question_arr = [];
$answer_arr = [];
$file = fopen("files/html_table_12.tst", "r"); // открываем файл на чтение
$data = date("M-d-Y", mktime()); // создаем метку времени для обеспечения уникального имени файла
while (!feof($file)) { 
    $str = fgets($file); // читаем файл построчно
    if (substr($str, 0, 10) === "{---------") { // находим начало вопроса
        $str_quest = strstr(fgets($file), ")"); // отрезаем номер вопроса до скобки ()
        $str_quest = trim(substr($str_quest, 1)); // отрезаем  скобку ( и пробелы в начале и конце
        $str_quest = rtrim($str_quest, "\r\n"); // отрезаем \r\n
        $question_arr[$str_quest] = [];  // создаем массив вопросов
        $answer_arr[$str_quest] = []; // создаем массив ответов
        fgets($file); // пропускаем строку &
        for ($i = 0; $i < 5; $i++) { // обходим 5 вариантов ответа
            $str_answ = fgets($file); // считываем ответ
            $str_answ = rtrim($str_answ, "\r\n"); // отрезаем  \r\n
            $str_answ = trim($str_answ); // отрезаем  пробелы в начале и конце
            if (substr($str_answ, 0, 1) === "*") { // если начинается на * 
                $question_arr[$str_quest][] = ltrim($str_answ, "*");  // вопрос записываем без *
                $answer_arr[$str_quest][] = "true";  // ответ отмечаем как правильный
            } else {   // иначе
                $question_arr[$str_quest][] = $str_answ;  //  записываем вопрос 
                $answer_arr[$str_quest][] = "false"; // ответ отмечаем как неправильный
            }
        }
        fgets($file); // пропускаем строку & 
    }
}

$json_question = json_encode($question_arr, JSON_UNESCAPED_UNICODE);  // преобразуем массив вопросов в формат json
$json_answer = json_encode($answer_arr, JSON_UNESCAPED_UNICODE); // преобразуем массив jndtnjd в формат json
print_r($json_question);
print_r($json_answer);

$jf_question = fopen('json_question_'.$data.'.json', 'w'); // открываем файл json с вопросами на запись
fwrite($jf_question, $json_question);
fclose($jf_question);
$jf_answer = fopen('json_answer_'.$data.'.json', 'w'); // открываем файл json с ответами на запись
fwrite($jf_answer, $json_answer);
fclose($jf_answer);
