<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Kami')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-size: 15px;
        }

        /* Navbar */
        .navbar-blog {
            background-color: #2C3E50;
            padding: 14px 0;
        }

        .navbar-blog .brand-title {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
        }

        .navbar-blog .brand-sub {
            font-size: 11px;
            color: #aaaaaa;
            margin: 0;
        }

        .navbar-blog .nav-link {
            color: #cccccc !important;
            font-size: 13px;
        }

        .navbar-blog .nav-link:hover {
            color: #ffffff !important;
        }

        /* Kartu artikel */
        .artikel-card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
            margin-bottom: 28px;
            overflow: hidden;
        }

        .artikel-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .artikel-card .body {
            padding: 20px 24px 24px;
        }

        .artikel-card .kategori-badge {
            display: inline-block;
            background: #e8f5e9;
            color: #2b9fec;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .artikel-card h2 {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .artikel-card .meta {
            font-size: 12px;
            color: #999;
            margin-bottom: 12px;
        }

        .artikel-card .meta .avatar {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #00a7bd;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            margin-right: 6px;
        }

        .artikel-card .ringkasan {
            font-size: 13px;
            color: #555;
            line-height: 1.7;
            margin-bottom: 16px;
            text-align: justify;
        }

        .btn-baca {
            background: #0c34e7;
            color: #fff;
            font-size: 13px;
            padding: 7px 18px;
            border-radius: 20px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-baca:hover {
            background: #07f7ff;
            color: #fff;
        }

        /* Sidebar widget */
        .widget {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .08);
            padding: 20px;
            margin-bottom: 20px;
        }

        .widget h5 {
            font-size: 15px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 16px;
        }

        .kategori-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            color: #444;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .kategori-item:hover {
            background: #f0f0f0;
            color: #333;
        }

        .kategori-item.active {
            background: #e8f5e9;
            color: #34e3f0;
            font-weight: 600;
        }

        .kategori-item .badge-count {
            background: #e8f5e9;
            color: #1897ff;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 20px;
        }

        .kategori-item.active .badge-count {
            background: #17a2ff;
            color: #fff;
        }

        /* Widget artikel terkait */
        .terkait-item {
            display: flex;
            gap: 12px;
            margin-bottom: 16px;
            align-items: flex-start;
        }

        .terkait-item img {
            width: 56px;
            height: 48px;
            object-fit: cover;
            border-radius: 6px;
            flex-shrink: 0;
        }

        .terkait-item .info a {
            font-size: 13px;
            font-weight: 600;
            color: #1a1a1a;
            text-decoration: none;
            line-height: 1.4;
            display: block;
        }

        .terkait-item .info a:hover {
            color: #008cdd;
        }

        .terkait-item .info .tgl {
            font-size: 11px;
            color: #999;
            margin-top: 3px;
        }

        /* Footer */
        .footer {
            background: #2C3E50;
            color: #aaaaaa;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar-blog">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('publik.index') }}" class="brand-title">Blog Kami</a>
                <p class="brand-sub">Artikel terbaru seputar teknologi dan pemrograman</p>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ route('publik.index') }}" class="nav-link">Beranda</a>
                <a href="#" class="nav-link">Artikel</a>
                <a href="#" class="nav-link">Kategori</a>
                <a href="#" class="nav-link">Tentang</a>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <div class="container mt-4">
        <div class="row">
            <!-- Konten kiri -->
            <div class="col-lg-8">
                @yield('content')
            </div>
            <!-- Sidebar kanan -->
            <div class="col-lg-4">
                @yield('sidebar')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2026 Blog Kami. Seluruh hak cipta dilindungi.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>