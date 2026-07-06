<?php

function loadData(string $dataFile): array {
    return json_decode(file_get_contents($dataFile), true);
}

function saveData(string $dataFile, array $data): void {
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function insertUser()