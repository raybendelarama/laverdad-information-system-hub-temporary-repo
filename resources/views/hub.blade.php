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

        /* Shared expandable icon-and-label button layout */
        .home-btn,
        .back-to-top {
            display: inline-flex;
            align-items: center;
            gap: 0;
            transition: gap 0.4s ease;
        }

        .home-btn:hover,
        .home-btn:focus-visible,
        .back-to-top:hover,
        .back-to-top:focus-visible {
            gap: 0.4rem;
        }

        .home-btn i,
        .back-to-top i {
            font-size: 1.9rem;
            transition: font-size 0.2s ease;
        }

        .back-to-top i {
            font-size: 1.5rem;
        }

        .home-btn span,
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

        .home-btn:hover span,
        .home-btn:focus-visible span,
        .back-to-top:hover span,
        .back-to-top:focus-visible span {
            max-width: 6rem;
            opacity: 1;
            visibility: visible;
        }

        .home-btn:hover i,
        .home-btn:focus-visible i,
        .back-to-top:hover i,
        .back-to-top:focus-visible i {
            font-size: 1.6rem;
        }

        /* Home button interaction */
        .home-btn:hover {
            color: var(--bs-warning);
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
    </style>
</head>

<body>
    <div class="container-fluid container-size container-gradient">
        <main class="hub-content px-3 px-lg-5">
            <div class="row align-items-center py-4 py-lg-5">
                <div class="col-12 col-md-8 order-2 order-md-1">
                    <h1 class="display-5 text-light fw-bold">La Verdad Information System</h1>
                    <p class="lead mb-0 text-light">The ultimate destination for all systems in one place.</p>
                </div>
                <div class="col-12 col-md-4 order-1 order-md-2 d-flex justify-content-end mb-3 mb-md-0">
                    <a href="https://web.uat.laverdad.edu.ph" rel="noopener noreferrer" aria-label="Home"
                        class="btn btn-link home-btn text-decoration-none text-light btn-sm px-4 rounded-pill">
                        <i class="ri-home-fill"></i>
                        <span>HOME</span>
                    </a>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-4 pb-4 pb-lg-5">
                @foreach($systems as $system)
                    <div class="col">
                        <x-card title="{{ $system['title'] }}" description="{{ $system['description'] }}" badge="SYSTEM"
                            members="1.2k+" />
                    </div>
                @endforeach
            </div>
        </main>
        <footer class="d-flex justify-content-center py-3 text-light">
            <span class="fs-6">&copy; {{ date('Y') }} · La Verdad Christian College, Inc.</span>
        </footer>
    </div>

    <button type="button" id="back-to-top" class="btn btn-warning rounded-pill back-to-top" aria-label="Back to top"
        title="Back to top" hidden>
        <i class="ri-arrow-up-line" aria-hidden="true"></i>
        <span>Back to top</span>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script>
        const backToTopButton = document.getElementById('back-to-top');

        function updateBackToTopButton() {
            backToTopButton.hidden = window.scrollY <= window.innerHeight;
        }

        window.addEventListener('scroll', updateBackToTopButton, { passive: true });
        window.addEventListener('resize', updateBackToTopButton);
        updateBackToTopButton();

        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth'
            });
        });
    </script>
</body>

</html>