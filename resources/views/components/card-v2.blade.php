@props([
    'title' => 'System Title',
    'description' => 'Description',
    'image' => null,
    'href' => '#',
])

@once
    <style>
        .card-v2 {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
            color: inherit;
            text-decoration: none;
            border-radius: 1rem;
            box-shadow: 0 .75rem 1.5rem rgba(15, 23, 42, .18);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .card-v2:hover,
        .card-v2:focus-visible {
            transform: translateY(-4px);
            box-shadow: 0 1rem 2rem rgba(15, 23, 42, .28);
        }

        .card-v2-media {
            position: relative;
            flex: 0 0 auto;
            width: 100%;
            aspect-ratio: 16 / 9;
            min-height: 160px;
            overflow: hidden;
            border-radius: 1rem;
            /* border: 1px solid #1f2937; */
            /* background-color: #172554; */
        }

        .card-v2:focus-visible {
            outline: 3px solid #0d6efd;
            outline-offset: 3px;
        }

        .card-v2-image {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-v2-content {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: flex-end;
            padding: 1rem;
            color: #fff;
            background: rgba(15, 23, 42, .38);
            -webkit-backdrop-filter: blur(8px);
            backdrop-filter: blur(8px);
            opacity: 0;
            visibility: hidden;
            transition: opacity .25s ease, visibility .25s ease;
        }

        .card-v2:hover .card-v2-content,
        .card-v2:focus-visible .card-v2-content {
            opacity: 1;
            visibility: visible;
        }

        .card-v2-title {
            margin: .75rem 0 0;
        }

        .card-v2-description {
            margin-bottom: 0;
            color: rgba(255, 255, 255, .82);
        }

        @media (prefers-reduced-motion: reduce) {

            .card-v2,
            .card-v2-content {
                transition: none;
            }

            .card-v2:hover,
            .card-v2:focus-visible {
                transform: none;
            }
        }
    </style>
@endonce

<a class="card-v2 p-3" href="{{ $href }}">
    <div class="card-v2-media">
        <img class="card-v2-image" src="{{ $image ?? asset('images/card-system-placeholder.svg') }}" alt="">
        <div class="card-v2-content">
            <p class="card-v2-description">{{ $description }}</p>
        </div>
    </div>
    <h5 class="card-v2-title">{{ $title }}</h5>
</a>