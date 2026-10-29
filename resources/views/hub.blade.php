<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LVIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css"
        integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://fonts.cdnfonts.com/css/tolkien" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abhaya+Libre&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --background-gradient: #003189, #1987C5;
            --body-bg-color: #FFFFFF;
            --text-color: #212529;
        }

        /* Base page styles */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .heading-title {
            font-family: 'Tolkien', sans-serif;
        }

        .container-gradient {
            background: linear-gradient(to right, var(--background-gradient));
        }

        /* h1,
        span,
        p {
            color: var(--text-color);
        } */

        .container-size {
            min-height: 100vh;
        }

        /* .hub-content {
            width: 100%;
            max-width: 1440px;
            margin-inline: auto;
        } */

        .back-to-top {
            display: inline-flex;
            align-items: center;
            gap: 0;
            transition: gap 0.4s ease;
        }

        .back-to-top:hover,
        .back-to-top:focus-visible {
            gap: 0.4rem;
        }

        .back-to-top i {
            font-size: 1.9rem;
            transition: font-size 0.2s ease;
        }

        .back-to-top i {
            font-size: 1.5rem;
        }

        .back-to-top span {
            max-width: 0;
            font-size: 0.8rem;
            font-weight: 600;
            opacity: 0;
            visibility: hidden;
            overflow: hidden;
            white-space: nowrap;
            transition: max-width 0.4s ease, opacity 0.4s ease, visibility 0.4s ease;
        }

        .back-to-top:hover span,
        .back-to-top:focus-visible span {
            max-width: 6rem;
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover i,
        .back-to-top:focus-visible i {
            font-size: 1.6rem;
        }

        /* Fixed back-to-top button placement and hidden-state handling */
        .back-to-top {
            position: fixed;
            right: 1.5rem;
            bottom: 1.5rem;
            z-index: 1030;
        }

        .back-to-top[hidden] {
            display: none;
        }

        .system-item.show {
            opacity: 1;
            transform: translateY(0);
        }

        .fst-inter {
            font-family: Inter, sans-serif;
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0 container-size d-flex flex-column">
        <x-hub-navbar />
        <main class="flex-grow-1 d-flex flex-column container">
            <div class="row text-center py-4 my-4">
                <p class="mb-0 display-6 fw-bold text-dark fst-inter">La Verdad System Portals</p>
                <p class="mb-0 fs-6 text-dark fst-inter">The ultimate destination for all systems in one place.</p>
            </div>


            <section class="container mb-4" aria-label="Search and filter systems">
                <x-search-bar :search="$search" :filter="$filter" />
                <x-tab-filter-section :filters="$filterTabs" />
            </section>

            @if($systems->isNotEmpty())
                <div id="system-grid" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 gy-4">
                    @foreach($systems as $system)
                        <div class="col system-item">
                            <x-card-v3 title="{{ $system['title'] }}" department="{{ $system['department'] }}"
                                description="{{ $system['description'] }}" href="{{ $system['link'] }}" />
                        </div>
                    @endforeach
                </div>
            @elseif($hasSystems)
                <div class="row flex-grow-1 justify-content-center align-items-center">
                    No systems match your search or selected category.
                </div>
            @else
                <div class="row flex-grow-1 justify-content-center align-items-center">
                    No systems available at the moment.
                </div>
            @endif
        </main>
        <x-hub-footer />
    </div>

    <x-back-to-top-button />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>