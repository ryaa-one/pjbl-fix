<?php
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/pagination.php';
forbid_direct_script_access(__FILE__);
require_role('admin');
$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$filterCategory = isset($_GET['filter_category']) ? trim($_GET['filter_category']) : "";
$sort = isset($_GET['sort']) ? trim($_GET['sort']) : "id";
$direction = isset($_GET['direction']) ? strtolower(trim($_GET['direction'])) : "desc";
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = getRowsPerPage('admin_events');

$allowedSorts = [
    'id' => 'events.id',
    'title' => 'events.title',
    'category' => 'categories.name',
    'date' => 'events.start_date',
    'location' => 'events.location',
    'admin' => "CASE WHEN event_admin.id IS NULL OR event_admin.level = 'admin' THEN 'admin' ELSE event_admin.name END",
];

if (! isset($allowedSorts[$sort])) {
    $sort = 'id';
}

if (! in_array($direction, ['asc', 'desc'], true)) {
    $direction = 'desc';
}

if ($currentPage < 1) {
    $currentPage = 1;
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

$queryEventsBase = "
    SELECT
        events.id,
        events.title,
        COALESCE(categories.name, 'Tanpa kategori') AS category,
        COALESCE(cities.name, '-') AS city,
        events.start_date,
        events.location,
        events.thumnail,
        events.status,
        events.rejection_reason,
        COALESCE(event_admin.level, 'admin') AS creator_level,
        (
            SELECT event_update_requests.id
            FROM event_update_requests
            WHERE event_update_requests.event_id = events.id
              AND event_update_requests.user_id = events.user_id
              AND event_update_requests.status = 'pending'
            ORDER BY event_update_requests.id DESC
            LIMIT 1
        ) AS pending_edit_request_id,
        (
            SELECT event_update_requests.title
            FROM event_update_requests
            WHERE event_update_requests.event_id = events.id
              AND event_update_requests.user_id = events.user_id
              AND event_update_requests.status = 'pending'
            ORDER BY event_update_requests.id DESC
            LIMIT 1
        ) AS pending_edit_title,
        CASE
            WHEN event_admin.id IS NULL OR event_admin.level = 'admin' THEN 'admin'
            ELSE event_admin.name
        END AS admin_name
    FROM events
    LEFT JOIN categories ON events.category_id = categories.id
    LEFT JOIN cities ON events.city_id = cities.id
    LEFT JOIN users AS event_admin ON event_admin.id = events.user_id
";

$conditions = [];
$paramTypes = '';
$paramValues = [];

if ($search !== "") {
    $searchLike = '%' . $search . '%';
    $conditions[] = "(LOWER(events.title) LIKE LOWER(?) OR LOWER(COALESCE(categories.name, '')) LIKE LOWER(?) OR LOWER(COALESCE(cities.name, '')) LIKE LOWER(?) OR LOWER(events.location) LIKE LOWER(?) OR LOWER(COALESCE(event_admin.name, '')) LIKE LOWER(?) OR ((event_admin.id IS NULL OR event_admin.level = 'admin') AND LOWER('admin') LIKE LOWER(?)) OR CAST(events.id AS CHAR) LIKE ?)";
    $paramTypes .= 'sssssss';
    array_push($paramValues, $searchLike, $searchLike, $searchLike, $searchLike, $searchLike, $searchLike, $searchLike);
}

if ($filterCategory !== '') {
    $conditions[] = "events.category_id = ?";
    $paramTypes .= 'i';
    $paramValues[] = (int) $filterCategory;
}

$whereSql = empty($conditions) ? '' : " WHERE " . implode(" AND ", $conditions);
$queryEventsBase .= $whereSql;
$queryCountEvents = "SELECT COUNT(*) AS total FROM events LEFT JOIN categories ON events.category_id = categories.id LEFT JOIN cities ON events.city_id = cities.id LEFT JOIN users AS event_admin ON event_admin.id = events.user_id" . $whereSql;

$totalEvents = 0;
$stmtCountEvents = mysqli_prepare($koneksi, $queryCountEvents);
if ($stmtCountEvents) {
    if (! empty($paramValues)) {
        mysqli_stmt_bind_param($stmtCountEvents, $paramTypes, ...$paramValues);
    }
    mysqli_stmt_execute($stmtCountEvents);
    $countEventsResult = mysqli_stmt_get_result($stmtCountEvents);
    $countEventsRow = $countEventsResult ? mysqli_fetch_assoc($countEventsResult) : null;
    $totalEvents = isset($countEventsRow['total']) ? (int) $countEventsRow['total'] : 0;
    mysqli_stmt_close($stmtCountEvents);
}

$totalEventPages = max(1, (int) ceil($totalEvents / $perPage));
if ($currentPage > $totalEventPages) {
    $currentPage = $totalEventPages;
}

$offset = ($currentPage - 1) * $perPage;
$queryEvents = $queryEventsBase . " ORDER BY " . $allowedSorts[$sort] . " " . strtoupper($direction) . ", events.id DESC LIMIT ? OFFSET ?";
$eventQueryParams = $paramValues;
$eventQueryParams[] = $perPage;
$eventQueryParams[] = $offset;
$eventParamTypes = $paramTypes . 'ii';

$stmtEvents = mysqli_prepare($koneksi, $queryEvents);
if ($stmtEvents) {
    mysqli_stmt_bind_param($stmtEvents, $eventParamTypes, ...$eventQueryParams);
    mysqli_stmt_execute($stmtEvents);
    $execEvents = mysqli_stmt_get_result($stmtEvents);
} else {
    $execEvents = false;
}
?>
