<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('components.style')
    @stack('addon-style')
</head>

<body>
    <nav class="navbar py-4 bg-soft-blue">
        <div class="container justify-content-between">
            <a href="." class="logo">
                <img src="assets/images/logo.png" alt="NewsOnlen">
                <span>NewsOnlen</span>
            </a>
            <div class="d-flex gap-4">
                <a href="dashboard.html" class="link">Dashboard</a>
                <a href="login.html" class="link">Keluar</a>
            </div>
        </div>
    </nav>

    <section class="bg-soft-blue">
        <div class="container">
            @yield('content')
        </div>
    </section>

    @include('components.footer')
    @include('components.script')
    @stack('addon-script')
</body>

</html>
