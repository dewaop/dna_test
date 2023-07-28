<?php
$data = array(
    "language" => "C",
    "appeared" => 1972,
    "created" => array("Dennis Ritchie"),
    "functional" => true,
    "object-oriented" => false,
    "relation" => array(
        "influenced-by" => array("B", "ALGOL 68", "Assembly", "FORTRAN"),
        "influences" => array("C++", "Objective-C", "C#", "Java", "JavaScript", "PHP", "Go")
    )
);

// Untuk mengakses dan menampilkan nilai dalam struktur data:
echo "Language: " . $data["language"] . PHP_EOL;
echo "Appeared: " . $data["appeared"] . PHP_EOL;
echo "Created by: " . implode(", ", $data["created"]) . PHP_EOL;
echo "Functional: " . ($data["functional"] ? "true" : "false") . PHP_EOL;
echo "Object-oriented: " . ($data["object-oriented"] ? "true" : "false") . PHP_EOL;

echo "Influenced by: " . implode(", ", $data["relation"]["influenced-by"]) . PHP_EOL;
echo "Influences: " . implode(", ", $data["relation"]["influences"]) . PHP_EOL;
