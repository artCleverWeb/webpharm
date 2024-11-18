<?php

define('FILE_USER_IMPORT', '/import/user/tab_num.csv'); // Путь к файлу с импортом пользователей

define('GRID__AUTH_USERS', 2); // ID группы пользователей в которую добавляются при регистрации

define('VAR_SESSION_USER_EXPERIENCED', 'USER_EXTENDED'); // Название переменной в сессии, которая хранит значение Опытный пользователь

define('IBLOCK_ID_COURSES', 2); // ID ИБ "Курсы"
define('IBLOCK_ID_NUM_CITIES', 3); // ID ИБ "Табельные номера: Города"
define('IBLOCK_ID_COURSES_TEST', 5); // ID ИБ "Корпоративное обучение: Тесты"
define('IBLOCK_ID_COURSES_RESULTS', 6); // ID ИБ "Табельные номера: Результаты"
define('IBLOCK_ID_COURSES_PROCESS', 8); // ID ИБ "Табельные номера: Прохождение"


define('IBLOCK_SECTION_CODE_START_WORK', 'start-working'); // Символьный код раздела "Начать работать" ИБ "Курсы"
define('IBLOCK_SECTION_CODE_EARN_MORE', 'earn-more'); // Символьный код раздела "Заработать больше" ИБ "Курсы"
define('IBLOCK_SECTION_CODE_EARN_EVEN_MORE', 'earn-even-more'); // Символьный код раздела "Заработать еще больше" ИБ "Курсы"
define('IBLOCK_SECTION_CODE_CAREER', 'career'); // Символьный код раздела "Мы заботимся о вас" ИБ "Курсы"
define('IBLOCK_SECTION_CODE_WE_CARE', 'we-care-about-you'); // Символьный код раздела "Карьера" ИБ "Курсы"

define('HL_TABLE_NOTIFICAION', 'user_notifications'); // Название HL таблицы Уведомлений пользователя
define('HL_TABLE_USERS', 'employee_personnel_numbers'); // Название HL таблицы Табельные номера сотрудников
define('HL_TABLE_PHARMACY_CHAIN', 'num_pharmacy_chain'); // Название HL таблицы Табельные номера: Аптечная сеть
define('HL_TABLE_SMS_LOGS', 'sms_logs'); // Название HL таблицы Логи СМС
define('HL_TABLE_TESTS_RESULT', 'tests_result'); // HL Блок Результаты тестов
define('HL_TABLE_TESTS_ACCRUALS', 'test_accruals'); // HL Блок Начисления
define('HL_TABLE_USER_PROCESS_EDUCATION', 'user_process_education'); // HL Прохождение Обучения