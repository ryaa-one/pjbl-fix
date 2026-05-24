<!DOCTYPE html>
<html>
<head>
    <title>EvenTura</title>
    <link rel="stylesheet" type="text/css" href="css/lp1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img class="gambar-logo" src="assets/images/logo-web.svg" />
        <h1 class="EvenTura">EvenTura</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="jelajah.php" class="active">Event</a></li>
                <li><a href="tentangKami.php">Tentang Kami</a></li>
            </ul>
            <div class="user-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
        </nav>
    </header>

    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-item active"> Dashboard </div>
            <div class="sidebar-item"> Event </div>
            <div class="sidebar-item"> Pengaturan </div>
            <div class="sidebar-item"> Logout </div>
        </aside>

        <main class="content">
            <h1> Dashboard </h1>

            <div class="jns-grid">
                <div class="jns-card">
                    <div class="jns-icon">
                    </div>
                    <div class="jns-info">
                        <div class="jns-label"> Total Event Favorit </div>
                        <div class="jns-value"> 12,345 </div>
                    </div>
                </div>
                <div class="jns-card">
                    <div class="jns-icon">
                    </div>
                    <div class="jns-info">
                        <div class="jns-label"> Total Event Like </div>
                        <div class="jns-value"> 6,789 </div>
                    </div>
                </div>
                <div class="jns-card">
                    <div class="jns-icon">
                    </div>
                    <div class="jns-info">
                        <div class="jns-label"> Total Event View </div>
                        <div class="jns-value"> 23,456 </div>
                    </div>
                </div>
            </div>

            <div class="event-overview">
                <h2> Event Overview </h2>

                <div class="event-header">
                    <div class="event-title">
                        <h3> Performa Event </h3>
                        <div class="event-subtitle"> 30 Hari Terakhir </div>
                    </div>
                </div>

                <div class="chart-container">
                <div class="chart-grid">
                    <div class="grid-line"></div>
                    <div class="grid-line"></div>
                    <div class="grid-line"></div>
                    <div class="grid-line"></div>
                    <div class="grid-line"></div>
                </div>
                <div class="chart-minggu">
                    <span> Minggu 1 </span>
                    <span> Minggu 2 </span>
                    <span> Minggu 3 </span>
                    <span> Minggu 4 </span>
                </div>
            </div>
            </div>
        </main>
    </div>
</body>

</html>
