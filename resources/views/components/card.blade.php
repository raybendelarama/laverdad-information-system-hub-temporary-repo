{{--
resources/views/components/app-menu-card.blade.php
Usage: <x-app-menu-card />
<x-app-menu-card title="Task Manager" badge="02" meta="12 modules" href="/tasks" />

Requires Bootstrap 5 CSS in your layout:
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

Place card-system-placeholder.svg in public/images/
--}}
@props([
    'title' => 'Deep Work Focus Camp',
    'description' => 'A distraction-free environment designed to help you create, think, and reset.',
    'badge' => '01',
    'meta' => 'Last opened 2h ago',
    'image' => null,
    'href' => '#',
    'cta' => 'Continue',
])

@once
    <style>
        .app-card {
            --background-gradient: #001B4D, #07527A;
            --c1: 0, 27, 77;
            --c2: 7, 82, 122;

            max-width: 720px;
            width: 100%;
            min-height: 380px;
            border: 1px solid rgba(255, 255, 255, .25);
            border-radius: 2rem;
            overflow: hidden;
            color: #fff;
            background: linear-gradient(160deg, var(--background-gradient));
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .15),
                0 24px 48px rgba(var(--c1), .30);
        }

        .app-card .card-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
        }

        .app-card .ac-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(var(--c2), .3) 0%,
                    rgba(var(--c1), .58) 35%,
                    rgba(var(--c1), .9) 62%,
                    rgba(var(--c1), .98) 100%);
        }

        .app-card .card-img-overlay {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 1.75rem;
        }

        /* hover effect */
        .app-card {
            transition: transform .35s cubic-bezier(.2, .7, .2, 1),
                border-color .35s ease,
                box-shadow .35s ease;
        }

        .app-card .card-img {
            transition: transform .6s cubic-bezier(.2, .7, .2, 1);
        }

        .app-card .ac-ghost {
            transition: color .35s ease, transform .35s ease;
        }

        .app-card .ac-cta {
            transition: transform .25s ease, background-color .25s ease, box-shadow .25s ease;
        }

        .app-card:hover {
            transform: translateY(-6px);
            border-color: rgba(255, 255, 255, .45);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .25),
                0 32px 64px rgba(var(--c1), .45),
                0 0 0 4px rgba(var(--c2), .18);
        }

        .app-card:hover .card-img {
            transform: scale(1.06);
        }

        .app-card:hover .ac-ghost {
            color: rgba(255, 255, 255, .18);
            transform: translateX(-6px);
        }

        .app-card:hover .ac-cta {
            transform: translateX(4px);
            background-color: var(--bs-warning);
            border-color: var(--bs-warning);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .25);
        }

        @media (prefers-reduced-motion: reduce) {

            .app-card,
            .app-card .card-img,
            .app-card .ac-ghost,
            .app-card .ac-cta {
                transition: none;
            }

            .app-card:hover,
            .app-card:hover .card-img,
            .app-card:hover .ac-ghost,
            .app-card:hover .ac-cta {
                transform: none;
            }
        }

        /* fade in + move up */
        @keyframes ac-rise {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ac-title {
            font-weight: 800;
            letter-spacing: .02em;
            text-transform: uppercase;
            font-size: clamp(1.5rem, 3.5vw, 2rem);
            animation: ac-rise .7s cubic-bezier(.2, .7, .2, 1) .1s both;
        }

        .ac-desc {
            max-width: 26rem;
            color: rgba(255, 255, 255, .78);
            animation: ac-rise .7s cubic-bezier(.2, .7, .2, 1) .25s both;
        }

        .ac-footer {
            animation: ac-rise .7s cubic-bezier(.2, .7, .2, 1) .4s both;
        }

        @media (prefers-reduced-motion: reduce) {

            .ac-title,
            .ac-desc,
            .ac-footer {
                animation: none;
            }
        }

        .ac-ghost {
            position: absolute;
            right: 1.25rem;
            bottom: -1.25rem;
            font-size: 9rem;
            font-weight: 900;
            line-height: 1;
            color: rgba(255, 255, 255, .10);
            pointer-events: none;
            user-select: none;
        }

        .ac-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4ade80;
            box-shadow: 0 0 0 4px rgba(74, 222, 128, .25);
        }

        .ac-cta {
            padding: .9rem 2.25rem;
            font-weight: 700;
            color: #0b1b3f;
            position: relative;
            z-index: 1;
        }

        /* System Card */


        .system-card {
            perspective: 1200px;
            height: 220px;
        }

        .system-card-inner {
            width: 100%;
            height: 100%;
            transition: transform 1s;
            transform-style: preserve-3d;
            position: relative;
        }

        .system-card:hover .system-card-inner {
            transform: rotateY(180deg);
        }

        .system-card-front,
        .system-card-back {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            backface-visibility: hidden;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 8px 20px #00000026;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .system-card-back {
            transform: rotateY(180deg);
            font-size: .95rem;
            line-height: 1.6;
        }
    </style>
@endonce

{{-- <div class="card app-card">
    <img src="{{ $image ?? asset('images/card-system-placeholder.svg') }}" class="card-img" alt="">
    <div class="ac-overlay"></div>

    <div class="card-img-overlay">
        <div class="position-relative">
            <span class="ac-ghost">{{ $badge }}</span>

            <h5 class="ac-title mb-2">{{ $title }}</h5>
            <p class="ac-desc mb-4">{{ $description }}</p>

            <div class="ac-footer d-flex align-items-center justify-content-end">

                <a href="{{ $href }}" class="btn btn-light rounded-pill ac-cta">{{ $cta }}</a>
            </div>
        </div>
    </div>
</div> --}}

<div class="system-card">
    <div class="system-card-inner">
        <div class="system-card-front">
            <div>
                <h5>{{ $title }}</h5>
            </div>
        </div>
        <div class="system-card-back">
            <div>
                <p class="mb-2">{{ $description }}</p>
                <a href="{{ $href }}" class="btn btn-light rounded-pill mt-3">{{ $cta }}</a>
            </div>
        </div>
    </div>
</div>