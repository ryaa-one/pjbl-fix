<?php

$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$filterCategory = isset($_GET['filter_category']) ? trim($_GET['filter_category']) : "";
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : "id";
$direction = isset($_GET['direction']) ? strtolower(trim($_GET['direction'])) : "desc";

$allowedSorts = [
    'id' => 'events.id',
    'title' => 'events.title',
    'category' => 'categories.name',
    'date' => 'events.start_date',
    'location' => 'events.location',
];

if (! isset($allowedSorts[$sort])) {
    $sort = 'id';
}

if (! in_array($direction, ['asc', 'desc'], true)) {
    $direction = 'desc';
}

$eventCategoryOptions = [];
$execEventCategoryOptions = mysqli_query($koneksi, "SELECT id, name FROM categories ORDER BY name ASC");
if ($execEventCategoryOptions) {
    while ($categoryRow = mysqli_fetch_assoc($execEventCategoryOptions)) {
        $eventCategoryOptions[(string) $categoryRow['id']] = $categoryRow['name'];
    }
}

if ($filterCategory !== '' && ! array_key_exists($filterCategory, $eventCategoryOptions)) {
    $filterCategory = '';
}

$queryEvents = "
    SELECT 
        events.id,
        events.title,
        COALESCE(categories.name, 'Tanpa kategori') AS category,
        COALESCE(cities.name, '-') AS city,
        events.start_date,
        events.location,
        events.thumnail
    FROM events

    LEFT JOIN categories 
        ON events.category_id = categories.id

    LEFT JOIN cities 
        ON events.city_id = cities.id
";

$conditions = [];
$paramTypes = '';
$paramValues = [];

if ($search !== "") {
    $searchLike = '%' . $search . '%';
    $conditions[] = "
        (
            LOWER(events.title) LIKE LOWER(?)
            OR LOWER(COALESCE(categories.name, '')) LIKE LOWER(?)
            OR LOWER(COALESCE(cities.name, '')) LIKE LOWER(?)
            OR LOWER(events.location) LIKE LOWER(?)
            OR CAST(events.id AS CHAR) LIKE ?
        )
    ";
    $paramTypes .= 'sssss';
    array_push($paramValues, $searchLike, $searchLike, $searchLike, $searchLike, $searchLike);
}

if ($filterCategory !== '') {
    $conditions[] = "events.category_id = ?";
    $paramTypes .= 'i';
    $paramValues[] = (int) $filterCategory;
}

if (! empty($conditions)) {
    $queryEvents .= " WHERE " . implode(" AND ", $conditions);
}

$queryEvents .= " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", events.id DESC";

if (! empty($paramValues)) {
    $stmtEvents = mysqli_prepare($koneksi, $queryEvents);
    if ($stmtEvents) {
        mysqli_stmt_bind_param($stmtEvents, $paramTypes, ...$paramValues);
        mysqli_stmt_execute($stmtEvents);
        $execEvents = mysqli_stmt_get_result($stmtEvents);
    } else {
        $execEvents = false;
    }
} else {
    $execEvents = mysqli_query($koneksi, $queryEvents);
}

?>
