@once
    <style>
        .home-btn {
            display: inline-flex;
            align-items: center;
            gap: 0;
            transition: gap .4s ease;
        }

        .home-btn:hover,
        .home-btn:focus-visible {
            gap: .4rem;
            color: var(--bs-warning);
        }

        .home-btn i {
            font-size: 1.9rem;
            transition: font-size .2s ease;
        }

        .home-btn span {
            max-width: 0;
            overflow: hidden;
            font-size: .8rem;
            font-weight: 600;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: max-width .4s ease, opacity .4s ease, visibility .4s ease;
        }

        .home-btn:hover span,
        .home-btn:focus-visible span {
            max-width: 6rem;
            opacity: 1;
            visibility: visible;
        }

        .home-btn:hover i,
        .home-btn:focus-visible i {
            font-size: 1.6rem;
        }

        @media (prefers-reduced-motion: reduce) {
            .home-btn,
            .home-btn i,
            .home-btn span {
                transition: none;
            }
        }
    </style>
@endonce

<a href="https://web.uat.laverdad.edu.ph" rel="noopener noreferrer" aria-label="Home"
    class="btn btn-link home-btn text-decoration-none text-light btn-sm px-4 rounded-pill">
    <i class="ri-home-fill" aria-hidden="true"></i>
    <span>HOME</span>
</a>
