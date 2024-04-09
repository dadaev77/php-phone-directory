<?php

$contacts_file = 'contacts.json';

// Загрузка контактов из файла JSON
function loadContacts($filename) {
    return json_decode(file_get_contents($filename), true);
}

// Сохранение контактов в файл JSON
function saveContacts($filename, $contacts) {
    file_put_contents($filename, json_encode($contacts));
}

// Обработка запроса на добавление контакта
function addContact(&$contacts, $name, $phone) {
    $contacts[] = ['name' => $name, 'phone' => $phone];
}

// Обработка запроса на удаление контакта
function deleteContact(&$contacts, $index) {
    array_splice($contacts, $index, 1);
}

$contacts = loadContacts($contacts_file);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['phone'])) {
        addContact($contacts, $_POST['name'], $_POST['phone']);
        saveContacts($contacts_file, $contacts);
    } elseif (isset($_POST['delete'])) {
        deleteContact($contacts, $_POST['delete']);
        saveContacts($contacts_file, $contacts);
    }
    header('Location: index.php');
    exit();
}

