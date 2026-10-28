@props([
    'title' => 'System Title',
    'department' => '',
    'description' => 'Description',
    'image' => null,
    'href' => '#',
])

@once
    <style>
        .card-v3 {
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .card-v3:hover,
        .card-v3:focus-visible {
            transform: translateY(-4px);
            /* box-shadow: 0 1rem 2rem rgba(15, 23, 42, .28) !important; */
        }

        .card-v3:focus-visible {
            outline: 3px solid #0d6efd;
            outline-offset: 3px;
        }

        .card-v3-content {
            background: rgba(15, 23, 42, .1);
            -webkit-backdrop-filter: blur(2px);
            backdrop-filter: blur(2px);
            opacity: 0;
            visibility: hidden;
            transition: opacity .25s ease, visibility .25s ease;
        }

        .card-v3:hover .card-v3-content,
        .card-v3:focus-visible .card-v3-content {
            opacity: 1;
            visibility: visible;
        }

        @media (prefers-reduced-motion: reduce) {

            .card-v3,
            .card-v3-content {
                transition: none;
            }

            .card-v3:hover,
            .card-v3:focus-visible {
                transform: none;
            }
        }
    </style>
@endonce

<a class="card card-v3 w-100 h-100 rounded-5 overflow-hidden text-decoration-none text-dark shadow" href="{{ $href }}">
    <div class="ratio ratio-16x9">
        <img class="w-100 h-100 object-fit-cover" src="{{ $image ?? asset('images/card-system-placeholder.svg') }}"
            alt="">
        <div
            class="card-v3-content position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end justify-content-center p-3 text-white">
            <span class="btn btn-sm btn-primary rounded-pill px-2 py-1">
                <span class="fw-semibold"><i class="ri-login-box-line fs-6"></i> Go to portal</span>
            </span>
        </div>
    </div>
    <div class="card-body px-4 text-dark">
        <span class="fs-6 text-muted fw-semibold text-capitalize">{{ $department }}</span>
        <h5 class="card-title text-left pt-2">{{ $title }}</h5>
        <p class="card-text text-left">{{ $description }}</p>

        {{-- <div class="border-top py-3 d-flex align-items-center gap-2 text-primary">
            <span class="fw-semibold">Go to the portal</span>
            <i class="ri-arrow-right-long-line fs-4 fw-normal"></i>
        </div> --}}
    </div>
</a>