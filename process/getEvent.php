<?php

$search = isset($_GET['search']) ? trim($_GET['search']) : "";

$queryEvents = "
    SELECT 
        events.id,
        events.title,
        categories.name AS category,
        cities.name AS city,
        events.start_date,
        events.location,
        events.thumnail
    FROM events

    JOIN categories 
        ON events.category_id = categories.id

    JOIN cities 
        ON events.city_id = cities.id
";

if ($search !== "") {
    $searchEscaped = mysqli_real_escape_string($koneksi, $search);

    $queryEvents .= "
        WHERE 
            events.title LIKE '%$searchEscaped%'
            OR categories.name LIKE '%$searchEscaped%'
            OR cities.name LIKE '%$searchEscaped%'
            OR events.location LIKE '%$searchEscaped%'
    ";
}

$queryEvents .= " ORDER BY events.id DESC";

$execEvents = mysqli_query($koneksi, $queryEvents);

?>