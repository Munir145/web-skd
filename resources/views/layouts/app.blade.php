<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal SKD CPNS</title>
    
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
   <nav class="navbar-portal" style="background: white; border-bottom: 1px solid #e2e8f0; position: sticky; top: 0; z-index: 50; padding: 15px 0;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
            
            <div style="display: flex; align-items: center; gap: 32px; flex-wrap: wrap;">
                
                <div style="display: flex; align-items: center; gap: 12px; flex-shrink: 0;">
                    <img src="{{ asset('images/icon.png') }}" alt="Icon Portal SKD" style="width: 36px; height: 36px; object-fit: contain; background-color: #1e3a8a; border-radius: 8px;">
                    <span style="font-size: 18px; color: #1e3a8a; font-weight: 700; white-space: nowrap;">Portal SKD</span>
                </div>
                
                <div class="nav-links" style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}" style="white-space: nowrap;">Beranda</a>
                    <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}" style="white-space: nowrap;">Dashboard</a>
                    <a href="/cari-data" class="{{ request()->is('cari-data') ? 'active' : '' }}" style="white-space: nowrap;">Cari Data</a>
                    <a href="/kontak" class="{{ request()->is('kontak') ? 'active' : '' }}" style="white-space: nowrap;">Kontak</a>
                </div>
                
            </div>

            <div style="display: flex; gap: 15px; align-items: center; flex-shrink: 0;">
                <select class="select-filter" style="padding: 8px 16px; margin: 0; cursor: pointer; border-radius: 8px;">
                    <option>2024</option>
                </select>
                <button class="btn-primary" style="margin: 0; padding: 8px 24px; font-size: 13px; border: none; cursor: pointer; white-space: nowrap; border-radius: 8px;">Login Admin</button>
            </div>

        </div>
    </nav>

    <main>
        <div class="animasi-halaman">
          @yield('content')
        </div>
    </main>

    <footer style="text-align: center; padding: 40px; color: #94a3b8; font-size: 12px; border-top: 1px solid #e2e8f0; margin-top: 60px;">
        &copy; 2026 Portal SKD CPNS. All rights reserved.
    </footer>
</body>
</html>