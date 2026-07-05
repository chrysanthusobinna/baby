<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jidenna Is Here — Baby Dedication 2026</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,600;0,9..144,700;1,9..144,300;1,9..144,400;1,9..144,600;1,9..144,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --cream:    #fffaf0;
            --warm:     #fff5e0;
            --peach:    #f7b39a;
            --rose:     #e98aa1;
            --sage:     #7da08b;
            --ink:      #2e2620;
            --muted:    #786b60;
            --gold:     #d9a441;
            --border:   rgba(46, 38, 32, 0.1);
            --shadow:   rgba(107, 82, 63, 0.14);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--ink);
            background: var(--cream);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Ambient background blobs */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(ellipse 60% 50% at 5% 5%,   rgba(247,179,154,.22) 0%, transparent 100%),
                radial-gradient(ellipse 50% 45% at 95% 8%,  rgba(125,160,139,.18) 0%, transparent 100%),
                radial-gradient(ellipse 55% 40% at 50% 100%, rgba(233,138,161,.12) 0%, transparent 100%);
            pointer-events: none;
            z-index: 0;
        }

        /* ─── UTILITIES ───────────────────────────── */
        .wrap {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* ─── NAV ─────────────────────────────────── */
        .nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 200;
            padding: 1.1rem 0;
            transition: background .35s ease, border-color .35s ease;
        }
        .nav.scrolled {
            background: rgba(255,250,240,.9);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .nav-inner {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav-brand {
            display: flex;
            align-items: center;
            gap: .65rem;
            text-decoration: none;
            color: var(--ink);
        }
        .nav-mono {
            width: 2.4rem; height: 2.4rem;
            border-radius: 50%;
            background: linear-gradient(145deg, var(--rose), var(--peach));
            color: #fff;
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .nav-title {
            font-size: .9rem;
            font-weight: 600;
            letter-spacing: .01em;
        }
        .nav-cta {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            padding: .55rem 1.1rem;
            border-radius: 999px;
            border: 1.5px solid var(--border);
            background: rgba(255,255,255,.65);
            color: var(--ink);
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s ease;
        }
        .nav-cta:hover {
            border-color: rgba(217,164,65,.5);
            background: rgba(255,255,255,.92);
        }

        /* ─── HERO ────────────────────────────────── */
        .hero {
            position: relative;
            z-index: 1;
            min-height: 100svh;
            padding: 8rem 0 5rem;
            display: flex;
            align-items: center;
        }
        .hero-grid {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        /* Left — text */
        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            padding: .38rem .85rem;
            border-radius: 999px;
            background: rgba(125,160,139,.12);
            border: 1px solid rgba(125,160,139,.28);
            color: var(--sage);
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 1.6rem;
        }
        .hero-h1 {
            font-family: 'Fraunces', serif;
            font-size: clamp(3.8rem, 8vw, 6.8rem);
            line-height: .92;
            font-weight: 700;
            letter-spacing: -.01em;
            margin-bottom: 1.6rem;
        }
        .hero-h1 .sub {
            display: block;
            font-style: italic;
            font-weight: 300;
            color: var(--muted);
        }
        .hero-lead {
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.85;
            max-width: 34rem;
            margin-bottom: 2.2rem;
        }
        .hero-btns {
            display: flex;
            gap: .8rem;
            flex-wrap: wrap;
            margin-bottom: 3rem;
        }
        .btn-solid {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .9rem 1.65rem;
            border-radius: 999px;
            border: none;
            background: linear-gradient(135deg, #2f6f61, #4a9a84);
            color: #fff;
            font-size: .95rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: transform .22s ease, box-shadow .22s ease;
            box-shadow: 0 10px 28px rgba(47,111,97,.28);
        }
        .btn-solid:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(47,111,97,.36);
        }
        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .9rem 1.65rem;
            border-radius: 999px;
            border: 1.5px solid var(--border);
            background: rgba(255,255,255,.6);
            color: var(--ink);
            font-size: .95rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s ease;
        }
        .btn-outline:hover {
            border-color: rgba(46,38,32,.22);
            background: rgba(255,255,255,.88);
            transform: translateY(-1px);
        }
        .scroll-cue {
            display: flex;
            align-items: center;
            gap: .5rem;
            color: var(--muted);
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: .06em;
            animation: float-cue 2.4s ease-in-out infinite;
        }
        @keyframes float-cue {
            0%, 100% { opacity: .55; transform: translateY(0); }
            50%       { opacity: 1;   transform: translateY(5px); }
        }

        /* Right — photo */
        .hero-photo {
            position: relative;
        }
        .hero-photo::before {
            content: '';
            position: absolute;
            inset: -1.2rem;
            border-radius: 2.8rem;
            background: linear-gradient(135deg, rgba(247,179,154,.28), rgba(233,138,161,.18));
            transform: rotate(1.8deg);
            z-index: 0;
        }
        .photo-frame {
            position: relative;
            z-index: 1;
            border-radius: 2rem;
            overflow: hidden;
            aspect-ratio: 4/5;
            box-shadow: 0 40px 100px var(--shadow);
        }
        .photo-frame::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            box-shadow: inset 0 0 0 1.5px rgba(255,255,255,.45);
            pointer-events: none;
            z-index: 2;
        }
        .photo-frame img {
            width: 100%; height: 100%;
            object-fit: cover;
            display: block;
        }
        .photo-badge {
            position: absolute;
            bottom: 1.5rem; left: 1.5rem;
            z-index: 3;
            padding: .75rem 1rem;
            border-radius: 1rem;
            background: rgba(255,250,240,.88);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,.55);
        }
        .photo-badge-label {
            font-size: .68rem;
            font-weight: 700;
            letter-spacing: .09em;
            text-transform: uppercase;
            color: var(--muted);
        }
        .photo-badge-val {
            font-family: 'Fraunces', serif;
            font-size: 1rem;
            font-weight: 600;
            color: var(--ink);
            margin-top: .1rem;
        }
        .photo-heart {
            position: absolute;
            top: 1.4rem; right: 1.4rem;
            z-index: 3;
            width: 2.8rem; height: 2.8rem;
            border-radius: 50%;
            background: rgba(233,138,161,.88);
            backdrop-filter: blur(8px);
            display: flex; align-items: center; justify-content: center;
            color: #fff;
            font-size: 1.1rem;
            animation: heartbeat 3s ease-in-out infinite;
        }
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            45%       { transform: scale(1.12); }
            60%       { transform: scale(1.05); }
        }

        /* ─── DIVIDER ─────────────────────────────── */
        .divider {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 2rem;
            color: var(--gold);
            font-size: 1rem;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(217,164,65,.3), transparent);
        }

        /* ─── STORY SECTION ───────────────────────── */
        .story {
            position: relative;
            z-index: 1;
            padding: 6rem 0;
        }
        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: start;
        }

        .section-label {
            display: flex;
            align-items: center;
            gap: .6rem;
            font-size: .74rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            margin-bottom: 1.1rem;
        }
        .section-label::before {
            content: '';
            width: 1.6rem;
            height: 2px;
            border-radius: 999px;
            background: currentColor;
        }
        .label-rose { color: var(--rose); }
        .label-sage { color: var(--sage); }

        .story-h2 {
            font-family: 'Fraunces', serif;
            font-size: clamp(2.1rem, 4vw, 3.2rem);
            line-height: 1.12;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        .story-body {
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.9;
        }
        .story-body p + p { margin-top: 1rem; }

        .scripture {
            margin-top: 2.2rem;
            padding: 1.4rem 1.5rem;
            border-left: 3px solid var(--gold);
            background: rgba(217,164,65,.07);
            border-radius: 0 1rem 1rem 0;
        }
        .scripture-text {
            font-family: 'Fraunces', serif;
            font-style: italic;
            font-size: 1.1rem;
            color: var(--ink);
            line-height: 1.65;
        }
        .scripture-ref {
            margin-top: .7rem;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
        }

        /* Blessings — right column */
        .blessings {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        .blessing {
            display: flex;
            gap: 1.2rem;
            align-items: flex-start;
        }
        .blessing-icon {
            flex-shrink: 0;
            width: 3rem; height: 3rem;
            border-radius: 1rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.25rem;
        }
        .bi-rose { background: rgba(233,138,161,.13); color: var(--rose); }
        .bi-sage { background: rgba(125,160,139,.13); color: var(--sage); }
        .bi-gold { background: rgba(217,164,65,.13);  color: var(--gold); }

        .blessing-body h3 {
            font-family: 'Fraunces', serif;
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: .35rem;
        }
        .blessing-body p {
            color: var(--muted);
            font-size: .93rem;
            line-height: 1.8;
        }

        /* ─── GIFT SECTION ────────────────────────── */
        .gift {
            position: relative;
            z-index: 1;
            padding: 6rem 0 7rem;
        }
        .gift-header {
            text-align: center;
            max-width: 38rem;
            margin: 0 auto 3.5rem;
        }
        .gift-h2 {
            font-family: 'Fraunces', serif;
            font-size: clamp(2.1rem, 4vw, 3.2rem);
            font-weight: 600;
            line-height: 1.12;
            margin-bottom: .9rem;
        }
        .gift-sub {
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.8;
        }

        /* Alerts */
        .alert {
            max-width: 42rem;
            margin: 0 auto 2rem;
            padding: 1rem 1.3rem;
            border-radius: 1rem;
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            font-weight: 600;
            font-size: .93rem;
        }
        .alert i { font-size: 1.3rem; flex-shrink: 0; margin-top: .05rem; }
        .alert-success { background: rgba(125,160,139,.12); border: 1px solid rgba(125,160,139,.3); color: var(--sage); }
        .alert-warn    { background: rgba(217,164,65,.1);  border: 1px solid rgba(217,164,65,.35);  color: #9c720e; }
        .alert-error   { background: rgba(233,138,161,.1); border: 1px solid rgba(233,138,161,.35); color: #b84567; }

        /* Gift card */
        .gift-card {
            max-width: 42rem;
            margin: 0 auto;
            background: rgba(255,255,255,.72);
            border: 1px solid var(--border);
            border-radius: 2rem;
            padding: 2.25rem;
            box-shadow: 0 28px 80px var(--shadow);
            backdrop-filter: blur(16px);
        }

        .field-label {
            display: block;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: .8rem;
        }
        .amounts-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: .6rem;
            margin-bottom: 1.4rem;
        }
        .amt-btn {
            padding: .95rem .5rem;
            border-radius: 1rem;
            border: 1.5px solid var(--border);
            background: rgba(255,255,255,.75);
            color: var(--ink);
            font-family: 'Fraunces', serif;
            font-size: 1.15rem;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            transition: all .18s ease;
            user-select: none;
        }
        .amt-btn:hover {
            border-color: rgba(217,164,65,.5);
            background: rgba(255,255,255,.95);
            transform: translateY(-2px);
        }
        .amt-btn.selected {
            border-color: var(--gold);
            background: rgba(217,164,65,.09);
            box-shadow: 0 0 0 3px rgba(217,164,65,.18);
            color: #7c5a00;
        }

        .input-wrap {
            position: relative;
            margin-bottom: 1.4rem;
        }
        .input-prefix {
            position: absolute;
            left: 1.1rem; top: 50%;
            transform: translateY(-50%);
            font-weight: 700;
            color: var(--muted);
            pointer-events: none;
            font-size: 1.05rem;
        }
        .form-input {
            width: 100%;
            padding: .9rem 1rem .9rem 1.9rem;
            border: 1.5px solid var(--border);
            border-radius: .9rem;
            background: rgba(255,255,255,.7);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease;
        }
        .form-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(217,164,65,.16);
        }

        .message-wrap { margin-bottom: 1.75rem; }
        .form-textarea {
            width: 100%;
            padding: .9rem 1rem;
            border: 1.5px solid var(--border);
            border-radius: .9rem;
            background: rgba(255,255,255,.7);
            color: var(--ink);
            font-family: 'Inter', sans-serif;
            font-size: .93rem;
            line-height: 1.7;
            min-height: 7rem;
            resize: vertical;
            outline: none;
            transition: border-color .18s ease, box-shadow .18s ease;
        }
        .form-textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(217,164,65,.16);
        }

        .pay-btn {
            width: 100%;
            padding: 1.05rem 1.5rem;
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, #2f6f61, #4a9a84);
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: .98rem;
            font-weight: 700;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            gap: .5rem;
            transition: transform .22s ease, box-shadow .22s ease, opacity .22s ease;
            box-shadow: 0 10px 28px rgba(47,111,97,.26);
        }
        .pay-btn:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 16px 36px rgba(47,111,97,.34);
        }
        .pay-btn:disabled { opacity: .5; cursor: not-allowed; }

        .secure-line {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            margin-top: 1rem;
            font-size: .8rem;
            color: var(--muted);
        }

        /* ─── FOCUS VISIBLE ──────────────────────── */
        :focus-visible {
            outline: 2.5px solid var(--gold);
            outline-offset: 3px;
            border-radius: .4rem;
        }

        /* ─── FOOTER ──────────────────────────────── */
        .site-footer {
            position: relative;
            z-index: 1;
            padding: 2.5rem 0;
            border-top: 1px solid var(--border);
            text-align: center;
        }
        .footer-name {
            font-family: 'Fraunces', serif;
            font-style: italic;
            font-weight: 300;
            font-size: 1.7rem;
            color: var(--muted);
            margin-bottom: .4rem;
        }
        .footer-text {
            font-size: .82rem;
            color: var(--muted);
        }

        /* ─── SCROLL REVEAL ───────────────────────── */
        .reveal {
            opacity: 0;
            transform: translateY(26px);
            transition:
                opacity  .75s cubic-bezier(.16,1,.3,1),
                transform .75s cubic-bezier(.16,1,.3,1);
        }
        .reveal.in { opacity: 1; transform: none; }
        .d1 { transition-delay: .1s; }
        .d2 { transition-delay: .2s; }
        .d3 { transition-delay: .3s; }
        .d4 { transition-delay: .45s; }

        /* Hero load-in */
        .hi {
            animation: hi .9s cubic-bezier(.16,1,.3,1) both;
        }
        .hi1 { animation-delay: .05s; }
        .hi2 { animation-delay: .18s; }
        .hi3 { animation-delay: .32s; }
        .hi4 { animation-delay: .48s; }
        .hi5 { animation-delay: .64s; }
        @keyframes hi {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: none; }
        }
        .photo-hi {
            animation: photo-hi 1.1s cubic-bezier(.16,1,.3,1) .15s both;
        }
        @keyframes photo-hi {
            from { opacity: 0; transform: translateY(14px) scale(.97); }
            to   { opacity: 1; transform: none; }
        }

        /* ─── RESPONSIVE ──────────────────────────── */
        @media (max-width: 900px) {
            .hero-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            .hero-photo {
                order: -1;
                max-width: 26rem;
                margin: 0 auto;
            }
            .hero-h1 { font-size: clamp(3.2rem,10vw,5rem); }
            .story-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
            .amounts-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 540px) {
            .hero { padding: 6rem 0 4rem; }
            .hero-h1 { font-size: clamp(2.8rem, 12vw, 4.2rem); }
            .gift-card { padding: 1.5rem; border-radius: 1.5rem; }
            .amounts-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>

<!-- ══════════════════════════════════════
     NAV
══════════════════════════════════════════ -->
<nav class="nav" id="nav">
    <div class="nav-inner">
        <a href="#" class="nav-brand">
            <div class="nav-mono">J</div>
            <span class="nav-title">Jidenna's Dedication</span>
        </a>
        <a href="#gift" class="nav-cta">
            <i aria-hidden="true" class="ph ph-gift"></i>
            Give a Gift
        </a>
    </div>
</nav>


<main>

<!-- ══════════════════════════════════════
     HERO
══════════════════════════════════════════ -->
<section class="hero">
    <div class="hero-grid">

        <div class="hero-content">
            <div class="hero-tag hi hi1">
                <i aria-hidden="true" class="ph-fill ph-sparkle"></i>
                Baby Dedication · July 2026
            </div>

            <h1 class="hero-h1">
                <span class="hi hi2" style="display:block;">Jidenna</span>
                <span class="hi hi3 sub">is here.</span>
            </h1>

            <p class="hero-lead hi hi4">
                A precious new life, born into a family full of love and gratitude.
                Today we gather to give thanks, to pray over this beautiful boy,
                and to celebrate the blessing he already is.
            </p>

            <div class="hero-btns hi hi5">
                <a href="#gift" class="btn-solid">
                    <i aria-hidden="true" class="ph-fill ph-heart"></i>
                    Send a Blessing
                </a>
                <a href="#story" class="btn-outline">
                    Read the welcome
                </a>
            </div>

            <div class="scroll-cue hi hi5">
                <i aria-hidden="true" class="ph ph-arrow-down"></i>
                Scroll to celebrate
            </div>
        </div>

        <div class="hero-photo photo-hi">
            <div class="photo-frame">
                <img src="{{ asset('images/jidenna-dedication-hero.png') }}" alt="Jidenna's baby dedication">
                <div class="photo-heart">
                    <i aria-hidden="true" class="ph-fill ph-heart"></i>
                </div>
                <div class="photo-badge">
                    <div class="photo-badge-label">Dedicated</div>
                    <div class="photo-badge-val">July 2026</div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- ══════════════════════════════════════
     DIVIDER
══════════════════════════════════════════ -->
<div class="divider">
    <i aria-hidden="true" class="ph-fill ph-leaf"></i>
</div>


<!-- ══════════════════════════════════════
     STORY SECTION
══════════════════════════════════════════ -->
<section id="story" class="story">
    <div class="wrap">
        <div class="story-grid">

            <!-- Left — text & scripture -->
            <div>
                <p class="section-label label-rose reveal">
                    A Welcome to the World
                </p>
                <h2 class="story-h2 reveal d1">
                    A day of love,<br>family, and<br>thanksgiving.
                </h2>
                <div class="story-body reveal d2">
                    <p>
                        Every child is a gift — and Jidenna is no exception.
                        From the very first moment, he has brought joy, wonder, and
                        an abundance of love into everything around him.
                    </p>
                    <p>
                        Today, surrounded by the people who will help shape his journey,
                        we dedicate this little life and commit to raising him
                        with faith, warmth, and purpose.
                    </p>
                </div>

                <blockquote class="scripture reveal d3">
                    <p class="scripture-text">
                        "Before I formed you in the womb I knew you,<br>
                        before you were born I set you apart."
                    </p>
                    <footer class="scripture-ref">— Jeremiah 1:5</footer>
                </blockquote>
            </div>

            <!-- Right — three blessings -->
            <ul class="blessings">
                <li class="blessing reveal">
                    <div class="blessing-icon bi-rose">
                        <i aria-hidden="true" class="ph-fill ph-heart"></i>
                    </div>
                    <div class="blessing-body">
                        <h3>Gratitude</h3>
                        <p>We thank God for the gift of Jidenna and the overflowing joy he brings. Every moment with him is a reminder of grace.</p>
                    </div>
                </li>
                <li class="blessing reveal d1">
                    <div class="blessing-icon bi-sage">
                        <i aria-hidden="true" class="ph-fill ph-hands-praying"></i>
                    </div>
                    <div class="blessing-body">
                        <h3>Prayer</h3>
                        <p>We surround him with prayers for health, wisdom, peace, and purpose — that he may grow to know and reflect the love of God.</p>
                    </div>
                </li>
                <li class="blessing reveal d2">
                    <div class="blessing-icon bi-gold">
                        <i aria-hidden="true" class="ph-fill ph-users-three"></i>
                    </div>
                    <div class="blessing-body">
                        <h3>Community</h3>
                        <p>We celebrate with family and friends who are part of Jidenna's story from the very beginning. It takes a village — and we are his.</p>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</section>


<!-- ══════════════════════════════════════
     DIVIDER
══════════════════════════════════════════ -->
<div class="divider">
    <i aria-hidden="true" class="ph-fill ph-star-four"></i>
</div>


<!-- ══════════════════════════════════════
     GIFT SECTION
══════════════════════════════════════════ -->
<section id="gift" class="gift">
    <div class="wrap">

        <div class="gift-header reveal">
            <p class="section-label label-sage" style="justify-content:center;">
                Gift Table
            </p>
            <h2 class="gift-h2">Send a blessing gift.</h2>
            <p class="gift-sub">
                Choose an amount, leave a note for Jidenna and the family,
                and you'll be guided to a secure checkout.
            </p>
        </div>

        @if (($paymentStatus ?? null) === 'success')
            <div class="alert alert-success reveal">
                <i aria-hidden="true" class="ph-fill ph-check-circle"></i>
                <span>Thank you! Your gift for Jidenna's dedication was received. What a blessing.</span>
            </div>
        @elseif (($paymentStatus ?? null) === 'cancel')
            <div class="alert alert-warn reveal">
                <i aria-hidden="true" class="ph ph-warning"></i>
                <span>Payment was cancelled — no problem. Choose an amount below whenever you're ready.</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error reveal">
                <i aria-hidden="true" class="ph ph-warning-circle"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form class="gift-card reveal d1" method="POST" action="{{ route('stripe.checkout') }}">
            @csrf
            <input id="hiddenAmt" type="hidden" name="amount" value="{{ old('amount') }}">

            <label class="field-label">Choose a gift amount</label>
            <div class="amounts-grid">
                <button class="amt-btn" type="button" data-amount="25">£25</button>
                <button class="amt-btn" type="button" data-amount="50">£50</button>
                <button class="amt-btn" type="button" data-amount="100">£100</button>
                <button class="amt-btn" type="button" data-amount="200">£200</button>
            </div>

            <label class="field-label" for="customAmt">Or enter your own</label>
            <div class="input-wrap">
                <span class="input-prefix">£</span>
                <input id="customAmt" class="form-input" type="number" min="1" step="1"
                       placeholder="0" value="{{ old('amount') }}">
            </div>

            <div class="message-wrap">
                <label class="field-label" for="msgField">
                    Leave a blessing message
                    <span style="font-weight:400;letter-spacing:0;text-transform:none;font-size:.75rem;">— optional</span>
                </label>
                <textarea id="msgField" class="form-textarea" name="message" maxlength="500"
                          placeholder="Write a blessing, prayer, or note for Jidenna and the family…">{{ old('message') }}</textarea>
            </div>

            <button id="payBtn" class="pay-btn" type="submit" disabled>
                <i aria-hidden="true" class="ph ph-lock-key"></i>
                <span id="payLabel">Choose an amount to continue</span>
            </button>

            <p class="secure-line">
                <i aria-hidden="true" class="ph ph-shield-check"></i>
                Secure payment via Stripe · Encrypted
            </p>
        </form>

    </div>
</section>


</main>

<!-- ══════════════════════════════════════
     FOOTER
══════════════════════════════════════════ -->
<footer class="site-footer">
    <div class="wrap">
        <p class="footer-name">Jidenna</p>
        <p class="footer-text">With love, from everyone who gathered to celebrate you. ✦</p>
    </div>
</footer>


<script>
    // ── Sticky nav ──────────────────────────────────────────
    const nav = document.getElementById('nav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 48);
    }, { passive: true });

    // ── Scroll reveal ───────────────────────────────────────
    const obs = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

    // ── Gift form logic ─────────────────────────────────────
    const amtBtns  = document.querySelectorAll('.amt-btn');
    const customIn = document.getElementById('customAmt');
    const hidden   = document.getElementById('hiddenAmt');
    const payBtn   = document.getElementById('payBtn');
    const payLabel = document.getElementById('payLabel');

    function setAmt(val) {
        const n = parseFloat(val);
        if (n >= 1) {
            hidden.value = Math.floor(n);
            payLabel.textContent = `Pay £${Math.floor(n)} with Stripe`;
            payBtn.disabled = false;
        } else {
            hidden.value = '';
            payLabel.textContent = 'Choose an amount to continue';
            payBtn.disabled = true;
        }
    }

    amtBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            amtBtns.forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            customIn.value = '';
            setAmt(btn.dataset.amount);
        });
    });

    customIn.addEventListener('input', () => {
        amtBtns.forEach(b => b.classList.remove('selected'));
        setAmt(customIn.value);
    });

    // Restore state on page load (e.g. validation error)
    setAmt(hidden.value);

    // If a preset matches the old value, highlight it
    if (hidden.value) {
        amtBtns.forEach(b => {
            if (b.dataset.amount === hidden.value) b.classList.add('selected');
        });
    }
</script>

</body>
</html>
