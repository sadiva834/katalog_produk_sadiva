<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Kasir Ende')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f8fafc;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #1e293b;
        }

        /* HEADER */
        .navbar {
            width: 100%;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }

        .navbar-container {
            max-width: 1200px;
            min-height: 70px;
            margin: auto;
            padding: 0 22px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* LOGO DAN NAMA TOKO */
        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: #2563eb;
            color: white;
            border-radius: 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;
            font-weight: 800;
        }

        .brand-text h2 {
            color: #1e293b;
            margin: 0;
            font-size: 18px;
            font-weight: 750;
        }

        .brand-text p {
            color: #64748b;
            margin: 3px 0 0;
            font-size: 11px;
        }

        /* MENU NAVIGASI */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-link {
            padding: 9px 16px;
            color: #475569;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-radius: 7px;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #eff6ff;
            color: #2563eb;
        }

        /* STATUS SISTEM */
        .nav-status {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 12px;
            border-left: 1px solid #e2e8f0;
            padding-left: 16px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
        }

        /* KONTEN */
        .main-content {
            min-height: calc(100vh - 70px);
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .navbar-container {
                min-height: 65px;
                padding: 8px 14px;
                gap: 8px;
            }

            .brand {
                gap: 8px;
            }

            .brand-icon {
                width: 35px;
                height: 35px;
                font-size: 18px;
            }

            .brand-text h2 {
                font-size: 15px;
            }

            .brand-text p {
                font-size: 9px;
            }

            .nav-menu {
                gap: 5px;
            }

            .nav-link {
                padding: 8px 10px;
                font-size: 12px;
            }

            .nav-status {
                display: none;
            }
        }
    </style>
</head>

<body>

    {{-- HEADER NAVBAR --}}
    <header class="navbar">
        <div class="navbar-container">

            <a href="{{ route('katalog.index') }}" class="brand">

                <div class="brand-icon">
                    K
                </div>

                <div class="brand-text">
                    <h2>KASIR ENDE</h2>
                    <p>Point of Sale System</p>
                </div>

            </a>

            <nav class="nav-menu">

                <a href="{{ route('katalog.index') }}"
                   class="nav-link active">
                    Katalog
                </a>

            

            </nav>

        </div>
    </header>

    {{-- KONTEN HALAMAN --}}
    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>
```