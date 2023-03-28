<?php
// Создаем объект класса DOMDocument
$doc = new DOMDocument();
// Получаем HTML-код страницы по URL-адресу
$html = file_get_contents('https://www.rbc.ua');
// Загружаем HTML-код в объект DOMDocument
$doc->loadHTML($html);

// Получаем все элементы <div> с классом "war_num"
$divs = $doc->getElementsByTagName('div');
foreach ($divs as $div) {
    if ($div->getAttribute('class') == 'war_num') {
        // Получаем текстовое содержимое элемента <div>
        $text = $div->nodeValue;
        // Извлекаем все числа из текста
        preg_match_all('/\d+/', $text, $matches);
        // Выводим числа через пробел
        echo implode(' ', $matches[0]);
        // Добавляем пробел в конце строки
        echo ' ';
    }
}
?>
