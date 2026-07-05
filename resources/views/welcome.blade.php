<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome, Jidenna</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,600;0,9..144,700;1,9..144,300;1,9..144,600;1,9..144,700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --cream:   #fffaf0;
            --peach-s: #fff4e6;
            --sage-s:  #f0f8f4;
            --ink:     #2e2620;
            --ink-90:  rgba(46,38,32,.9);
            --muted:   #786b60;
            --rose:    #e98aa1;
            --peach:   #f7b39a;
            --sage:    #7da08b;
            --gold:    #d9a441;
            --border:  rgba(46,38,32,.1);
        }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--ink);
            background: var(--cream);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ── ANIMATED ORB BACKGROUND ─────────────── */
        .orbs {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }
        .orb {
            position: absolute;
            filter: blur(90px);
            opacity: .18;
            border-radius: 40% 60% 55% 45% / 50% 45% 55% 50%;
            will-change: transform;
        }
        .orb-1 {
            width: min(55vw, 520px); height: min(55vw, 520px);
            background: var(--peach);
            top: -8%; left: -8%;
            animation: drift-a 28s ease-in-out infinite;
        }
        .orb-2 {
            width: min(45vw, 420px); height: min(45vw, 420px);
            background: var(--rose);
            top: 10%; right: -10%;
            animation: drift-b 35s ease-in-out infinite;
        }
        .orb-3 {
            width: min(38vw, 360px); height: min(38vw, 360px);
            background: var(--sage);
            bottom: 15%; left: 2%;
            animation: drift-c 42s ease-in-out infinite;
        }
        .orb-4 {
            width: min(30vw, 280px); height: min(30vw, 280px);
            background: var(--gold);
            bottom: 5%; right: 10%;
            animation: drift-d 50s ease-in-out infinite;
        }
        .orb-5 {
            width: min(22vw, 200px); height: min(22vw, 200px);
            background: var(--peach);
            top: 55%; left: 40%;
            animation: drift-a 60s ease-in-out infinite reverse;
            opacity: .12;
        }

        @keyframes drift-a {
            0%,100% { transform: translate(0,0) scale(1); }
            25%      { transform: translate(4vw,6vh) scale(1.06); }
            50%      { transform: translate(-3vw,9vh) scale(.94); }
            75%      { transform: translate(5vw,2vh) scale(1.03); }
        }
        @keyframes drift-b {
            0%,100% { transform: translate(0,0) scale(1); }
            33%      { transform: translate(-5vw,7vh) scale(1.08); }
            66%      { transform: translate(3vw,-4vh) scale(.96); }
        }
        @keyframes drift-c {
            0%,100% { transform: translate(0,0) scale(1); }
            20%      { transform: translate(3vw,-5vh) scale(1.04); }
            60%      { transform: translate(-4vw,6vh) scale(.97); }
        }
        @keyframes drift-d {
            0%,100% { transform: translate(0,0); }
            40%      { transform: translate(-6vw,-4vh) scale(1.05); }
            80%      { transform: translate(3vw,3vh) scale(.98); }
        }

        /* Floating petals / particles */
        .petals { position: fixed; inset: 0; z-index: 0; pointer-events: none; overflow: hidden; }
        .petal {
            position: absolute;
            border-radius: 50% 30% 50% 30%;
            opacity: 0;
            animation: fall linear infinite;
        }
        @keyframes fall {
            0%   { opacity: 0; transform: translateY(-10vh) rotate(0deg); }
            10%  { opacity: .55; }
            90%  { opacity: .4; }
            100% { opacity: 0; transform: translateY(105vh) rotate(540deg); }
        }

        /* ── UTILITIES ──────────────────────────────── */
        .wrap { max-width: 1140px; margin: 0 auto; padding: 0 1.25rem; }

        /* ── NAV ──────────────────────────────────── */
        .nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 200;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: background .3s, border-color .3s;
        }
        .nav.scrolled {
            background: rgba(255,250,240,.88);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }
        .nav-brand {
            display: flex; align-items: center; gap: .6rem;
            text-decoration: none; color: var(--ink);
        }
        .nav-mono {
            width: 2.2rem; height: 2.2rem; border-radius: 50%;
            background: linear-gradient(145deg, var(--rose), var(--peach));
            color: #fff; font-family: 'Fraunces', serif;
            font-size: .95rem; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .nav-label { font-size: .85rem; font-weight: 600; }
        .nav-cta {
            display: inline-flex; align-items: center; gap: .4rem;
            padding: .5rem 1rem; border-radius: 999px;
            border: 1.5px solid var(--border);
            background: rgba(255,255,255,.65);
            color: var(--ink); font-size: .82rem; font-weight: 600;
            text-decoration: none;
            transition: all .2s;
        }
        .nav-cta:hover { border-color: rgba(217,164,65,.5); background: rgba(255,255,255,.9); }

        /* ── HERO ──────────────────────────────────── */
        .hero {
            position: relative; z-index: 1;
            background: var(--cream);
            padding-top: 5.5rem;
            min-height: 100svh;
            display: flex; align-items: center;
        }
        .hero-inner {
            display: flex; flex-direction: column;
            gap: 2.25rem;
            padding: 2rem 1.25rem 3.5rem;
            max-width: 1140px; margin: 0 auto; width: 100%;
        }

        /* Mobile: photo first */
        .hero-photo { order: -1; }

        .photo-frame {
            position: relative;
            border-radius: 1.5rem;
            overflow: hidden;
            aspect-ratio: 3/4;
            max-height: 50svh;
            box-shadow: 0 24px 70px rgba(107,82,63,.18);
        }
        .photo-frame img {
            width: 100%; height: 100%;
            object-fit: cover; display: block;
        }
        .photo-frame::after {
            content: '';
            position: absolute; inset: 0;
            border-radius: inherit;
            box-shadow: inset 0 0 0 1.5px rgba(255,255,255,.4);
            pointer-events: none; z-index: 1;
        }

        /* Decorative soft bg behind photo */
        .photo-wrap { position: relative; }
        .photo-wrap::before {
            content: '';
            position: absolute;
            inset: -.8rem;
            border-radius: 2rem;
            background: linear-gradient(135deg, rgba(247,179,154,.24), rgba(233,138,161,.16));
            transform: rotate(1.5deg);
            z-index: 0;
        }

        .photo-badge {
            position: absolute; bottom: 1.2rem; left: 1.2rem; z-index: 2;
            padding: .65rem .9rem; border-radius: .85rem;
            background: rgba(255,250,240,.88); backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,.55);
        }
        .badge-label { font-size: .64rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--muted); }
        .badge-val { font-family: 'Fraunces', serif; font-size: .95rem; font-weight: 600; color: var(--ink); margin-top: .06rem; }

        .photo-pill {
            position: absolute; top: 1.2rem; right: 1.2rem; z-index: 2;
            display: flex; align-items: center; gap: .35rem;
            padding: .45rem .85rem; border-radius: 999px;
            background: rgba(233,138,161,.88); backdrop-filter: blur(8px);
            color: #fff; font-size: .78rem; font-weight: 700;
            animation: heartbeat 3s ease-in-out infinite;
        }
        @keyframes heartbeat {
            0%,100% { transform: scale(1); }
            45%      { transform: scale(1.1); }
            60%      { transform: scale(1.04); }
        }

        /* Hero text */
        .hero-text {}
        .hero-tag {
            display: inline-flex; align-items: center; gap: .4rem;
            padding: .35rem .8rem; border-radius: 999px;
            background: rgba(125,160,139,.1); border: 1px solid rgba(125,160,139,.25);
            color: var(--sage); font-size: .72rem; font-weight: 700;
            letter-spacing: .08em; text-transform: uppercase;
            margin-bottom: 1.1rem;
        }
        .hero-h1 {
            font-family: 'Fraunces', serif;
            font-size: clamp(3.8rem, 14vw, 7rem);
            line-height: .9;
            font-weight: 700;
            letter-spacing: -.01em;
            margin-bottom: 1.1rem;
        }
        .hero-h1 .sub {
            display: block;
            font-style: italic; font-weight: 300;
            color: var(--muted);
        }
        .hero-tagline {
            font-size: 1rem;
            color: var(--muted);
            line-height: 1.75;
            max-width: 28rem;
            margin-bottom: 1.8rem;
        }
        .hero-btns { display: flex; gap: .7rem; flex-wrap: wrap; }

        .btn-solid {
            display: inline-flex; align-items: center; gap: .45rem;
            padding: .85rem 1.5rem; border-radius: 999px;
            border: none;
            background: linear-gradient(135deg, #2f6f61, #4a9a84);
            color: #fff; font-size: .92rem; font-weight: 700;
            text-decoration: none; cursor: pointer;
            transition: transform .2s, box-shadow .2s;
            box-shadow: 0 8px 24px rgba(47,111,97,.28);
        }
        .btn-solid:hover { transform: translateY(-2px); box-shadow: 0 14px 32px rgba(47,111,97,.36); }

        .btn-ghost {
            display: inline-flex; align-items: center; gap: .45rem;
            padding: .85rem 1.5rem; border-radius: 999px;
            border: 1.5px solid var(--border);
            background: rgba(255,255,255,.6);
            color: var(--ink); font-size: .92rem; font-weight: 600;
            text-decoration: none; cursor: pointer;
            transition: all .2s;
        }
        .btn-ghost:hover { border-color: rgba(46,38,32,.22); background: rgba(255,255,255,.88); transform: translateY(-1px); }

        /* ── STORY SECTION ──────────────────────── */
        .story {
            position: relative; z-index: 1;
            background: var(--peach-s);
            padding: 5rem 1.25rem;
        }
        .story-inner { max-width: 1140px; margin: 0 auto; }

        .s-eyebrow {
            font-size: .72rem; font-weight: 700; letter-spacing: .1em;
            text-transform: uppercase; color: var(--rose);
            display: flex; align-items: center; gap: .55rem;
            margin-bottom: .9rem;
        }
        .s-eyebrow::before { content: ''; width: 1.4rem; height: 2px; border-radius: 999px; background: currentColor; }

        .s-h2 {
            font-family: 'Fraunces', serif;
            font-size: clamp(2.2rem, 7vw, 3.6rem);
            font-weight: 600; line-height: 1.05;
            margin-bottom: 1.4rem;
        }
        .s-body { color: var(--muted); font-size: .97rem; line-height: 1.85; max-width: 32rem; margin-bottom: 2rem; }

        .scripture {
            padding: 1.25rem 1.35rem;
            border-left: 3px solid var(--gold);
            background: rgba(217,164,65,.07);
            border-radius: 0 .9rem .9rem 0;
            margin-bottom: 3rem;
        }
        .scripture-q {
            font-family: 'Fraunces', serif; font-style: italic;
            font-size: 1.05rem; color: var(--ink); line-height: 1.65;
        }
        .scripture-ref {
            margin-top: .6rem; font-size: .74rem; font-weight: 700;
            letter-spacing: .07em; text-transform: uppercase; color: var(--muted);
        }

        /* Three blessings */
        .blessings {
            list-style: none;
            display: flex; flex-direction: column; gap: 1.5rem;
        }
        .blessing {
            display: flex; gap: 1.1rem; align-items: flex-start;
        }
        .bl-icon {
            flex-shrink: 0;
            width: 2.8rem; height: 2.8rem; border-radius: .9rem;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.15rem;
        }
        .bl-rose { background: rgba(233,138,161,.13); color: var(--rose); }
        .bl-sage { background: rgba(125,160,139,.13); color: var(--sage); }
        .bl-gold { background: rgba(217,164,65,.13);  color: var(--gold); }

        .bl-body h3 {
            font-family: 'Fraunces', serif; font-size: 1.05rem;
            font-weight: 600; margin-bottom: .2rem;
        }
        .bl-body p { color: var(--muted); font-size: .88rem; line-height: 1.75; }

        /* ── DIVIDER ────────────────────────────── */
        .divider {
            position: relative; z-index: 1;
            display: flex; align-items: center; gap: 1rem;
            padding: 0 1.25rem; max-width: 1140px; margin: 0 auto;
            color: var(--gold);
        }
        .divider::before, .divider::after {
            content: ''; flex: 1; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(217,164,65,.28), transparent);
        }

        /* ── GIFT SECTION ───────────────────────── */
        .gift {
            position: relative; z-index: 1;
            background: var(--sage-s);
            padding: 5rem 1.25rem 6rem;
        }
        .gift-inner { max-width: 1140px; margin: 0 auto; }

        .gift-header { margin-bottom: 2.5rem; }
        .g-eyebrow {
            font-size: .72rem; font-weight: 700; letter-spacing: .1em;
            text-transform: uppercase; color: var(--sage);
            display: flex; align-items: center; gap: .55rem;
            margin-bottom: .9rem;
        }
        .g-eyebrow::before { content: ''; width: 1.4rem; height: 2px; border-radius: 999px; background: currentColor; }

        .g-h2 {
            font-family: 'Fraunces', serif;
            font-size: clamp(2.2rem, 7vw, 3.6rem);
            font-weight: 600; line-height: 1.05;
        }

        /* Alerts */
        .alert {
            padding: .9rem 1.1rem; border-radius: .9rem;
            display: flex; align-items: flex-start; gap: .7rem;
            font-weight: 600; font-size: .9rem; margin-bottom: 1.5rem;
        }
        .alert i { font-size: 1.2rem; flex-shrink: 0; margin-top: .05rem; }
        .alert-ok  { background: rgba(125,160,139,.12); border: 1px solid rgba(125,160,139,.28); color: var(--sage); }
        .alert-w   { background: rgba(217,164,65,.1);  border: 1px solid rgba(217,164,65,.32);  color: #8a6300; }
        .alert-err { background: rgba(233,138,161,.1); border: 1px solid rgba(233,138,161,.32); color: #b84567; }

        /* Gift card */
        .gift-card {
            background: rgba(255,255,255,.74);
            border: 1px solid var(--border);
            border-radius: 1.75rem;
            padding: 1.75rem;
            box-shadow: 0 24px 70px rgba(107,82,63,.12);
            backdrop-filter: blur(16px);
        }

        .f-label {
            display: block; font-size: .72rem; font-weight: 700;
            letter-spacing: .07em; text-transform: uppercase;
            color: var(--muted); margin-bottom: .75rem;
        }
        .amounts {
            display: grid; grid-template-columns: repeat(4,1fr);
            gap: .55rem; margin-bottom: 1.25rem;
        }
        .amt {
            padding: .9rem .4rem; border-radius: .9rem;
            border: 1.5px solid var(--border);
            background: rgba(255,255,255,.75);
            color: var(--ink); font-family: 'Fraunces', serif;
            font-size: 1.1rem; font-weight: 600;
            cursor: pointer; text-align: center;
            transition: all .18s;
            -webkit-tap-highlight-color: transparent;
        }
        .amt:hover  { border-color: rgba(217,164,65,.45); transform: translateY(-2px); }
        .amt.picked { border-color: var(--gold); background: rgba(217,164,65,.09); box-shadow: 0 0 0 3px rgba(217,164,65,.18); color: #7c5800; }

        .input-row { position: relative; margin-bottom: 1.2rem; }
        .input-prefix { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); font-weight: 700; color: var(--muted); pointer-events: none; }
        .f-input {
            width: 100%; padding: .85rem 1rem .85rem 1.75rem;
            border: 1.5px solid var(--border); border-radius: .85rem;
            background: rgba(255,255,255,.7); color: var(--ink);
            font-family: 'Inter', sans-serif; font-size: .97rem; font-weight: 600;
            outline: none; transition: border-color .18s, box-shadow .18s;
        }
        .f-input:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(217,164,65,.15); }

        .f-textarea {
            width: 100%; padding: .85rem 1rem; margin-bottom: 1.5rem;
            border: 1.5px solid var(--border); border-radius: .85rem;
            background: rgba(255,255,255,.7); color: var(--ink);
            font-family: 'Inter', sans-serif; font-size: .92rem; line-height: 1.7;
            min-height: 6.5rem; resize: vertical; outline: none;
            transition: border-color .18s, box-shadow .18s;
        }
        .f-textarea:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(217,164,65,.15); }

        .pay-btn {
            width: 100%; padding: 1rem 1.5rem;
            border: none; border-radius: 999px;
            background: linear-gradient(135deg, #2f6f61, #4a9a84);
            color: #fff; font-family: 'Inter', sans-serif;
            font-size: .95rem; font-weight: 700;
            cursor: pointer; display: flex; align-items: center; justify-content: center; gap: .5rem;
            transition: transform .2s, box-shadow .2s, opacity .2s;
            box-shadow: 0 8px 24px rgba(47,111,97,.24);
            -webkit-tap-highlight-color: transparent;
        }
        .pay-btn:hover:not(:disabled) { transform: translateY(-2px); box-shadow: 0 14px 32px rgba(47,111,97,.34); }
        .pay-btn:disabled { opacity: .45; cursor: not-allowed; }

        .secure-note {
            display: flex; align-items: center; justify-content: center; gap: .4rem;
            margin-top: .85rem; font-size: .78rem; color: var(--muted);
        }

        /* ── FOOTER ──────────────────────────────── */
        .site-footer {
            position: relative; z-index: 1;
            background: var(--ink);
            padding: 2.75rem 1.25rem;
            text-align: center;
        }
        .footer-name {
            font-family: 'Fraunces', serif; font-style: italic;
            font-weight: 300; font-size: 2rem; color: rgba(255,250,240,.7);
            margin-bottom: .4rem;
        }
        .footer-copy { font-size: .82rem; color: rgba(255,250,240,.4); }

        /* ── FOCUS ───────────────────────────────── */
        :focus-visible { outline: 2.5px solid var(--gold); outline-offset: 3px; border-radius: .4rem; }

        /* ── SCROLL REVEAL ───────────────────────── */
        .reveal {
            opacity: 0; transform: translateY(22px);
            transition: opacity .72s cubic-bezier(.16,1,.3,1), transform .72s cubic-bezier(.16,1,.3,1);
        }
        .reveal.in { opacity: 1; transform: none; }
        .d1 { transition-delay: .1s; }
        .d2 { transition-delay: .22s; }
        .d3 { transition-delay: .34s; }

        /* Hero load animations */
        .hi { animation: hi .85s cubic-bezier(.16,1,.3,1) both; }
        .hi1 { animation-delay: .04s; }
        .hi2 { animation-delay: .16s; }
        .hi3 { animation-delay: .3s; }
        .hi4 { animation-delay: .44s; }
        .hi5 { animation-delay: .58s; }
        @keyframes hi {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: none; }
        }
        .phi { animation: phi 1s cubic-bezier(.16,1,.3,1) .1s both; }
        @keyframes phi {
            from { opacity: 0; transform: translateY(12px) scale(.97); }
            to   { opacity: 1; transform: none; }
        }

        /* ── DESKTOP ENHANCEMENTS ────────────────── */
        @media (min-width: 768px) {
            .hero-inner {
                flex-direction: row;
                align-items: center;
                gap: 4rem;
                padding: 2rem 2rem 4rem;
            }
            .hero-photo { order: 0; flex: 1; }
            .hero-text  { flex: 1; }
            .photo-frame { max-height: 90svh; aspect-ratio: 4/5; }
            .hero-h1 { font-size: clamp(4rem, 7vw, 7rem); }
            .story, .gift { padding: 6.5rem 2rem; }
            .story-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: start; }
            .gift-card { max-width: 42rem; }
            .amounts { grid-template-columns: repeat(4,1fr); }
        }

        @media (min-width: 1024px) {
            .hero-inner { padding: 2rem 2rem 5rem; }
            .story { padding: 7rem 2rem; }
            .gift { padding: 7rem 2rem 8rem; }
            .nav { padding: 1rem 2rem; }
        }
    </style>
</head>
<body>

<!-- ─ Animated background ─────────────── -->
<div class="orbs" aria-hidden="true">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="orb orb-4"></div>
    <div class="orb orb-5"></div>
</div>
<div class="petals" aria-hidden="true" id="petals"></div>

<!-- ─ Nav ────────────────────────────────── -->
<nav class="nav" id="nav">
    <a href="#" class="nav-brand">
        <div class="nav-mono">J</div>
        <span class="nav-label">Welcome, Jidenna</span>
    </a>
    <a href="#gift" class="nav-cta">
        <i aria-hidden="true" class="ph ph-gift"></i>
        Give a Gift
    </a>
</nav>

<main>

<!-- ─ HERO ──────────────────────────────── -->
<section class="hero">
    <div class="hero-inner">

        <div class="hero-photo phi">
            <div class="photo-wrap">
                <div class="photo-frame">
                    <img src="{{ asset('images/jidenna-dedication-hero.png') }}" alt="Jidenna — welcomed with love">
                    <div class="photo-pill">
                        <i aria-hidden="true" class="ph-fill ph-heart"></i>
                        He's here
                    </div>
                    <div class="photo-badge">
                        <div class="badge-label">Welcome</div>
                        <div class="badge-val">July 2026</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-text">
            <div class="hero-tag hi hi1">
                <i aria-hidden="true" class="ph-fill ph-sparkle"></i>
                July 2026
            </div>
            <h1 class="hero-h1">
                <span class="hi hi2">Welcome,</span>
                <span class="sub hi hi3">Jidenna.</span>
            </h1>
            <p class="hero-tagline hi hi4">
                A precious new life. Born into love, welcomed with joy.
            </p>
            <div class="hero-btns hi hi5">
                <a href="#gift" class="btn-solid">
                    <i aria-hidden="true" class="ph-fill ph-heart"></i>
                    Send a Blessing
                </a>
                <a href="#story" class="btn-ghost">Our welcome</a>
            </div>
        </div>

    </div>
</section>

<!-- ─ STORY ─────────────────────────────── -->
<section id="story" class="story">
    <div class="story-inner">

        <div>
            <p class="s-eyebrow reveal">A note from the family</p>
            <h2 class="s-h2 reveal d1">Love, prayer<br>and gratitude.</h2>
            <p class="s-body reveal d2">
                Every child is a gift, and Jidenna has already filled our hearts beyond measure.
                Today we gather, give thanks, and commit to raising him with faith and purpose.
            </p>
            <blockquote class="scripture reveal d3">
                <p class="scripture-q">"Before I formed you in the womb I knew you."</p>
                <footer class="scripture-ref">— Jeremiah 1:5</footer>
            </blockquote>
        </div>

        <ul class="blessings">
            <li class="blessing reveal">
                <div class="bl-icon bl-rose"><i aria-hidden="true" class="ph-fill ph-heart"></i></div>
                <div class="bl-body">
                    <h3>Gratitude</h3>
                    <p>We thank God for the gift of Jidenna and the joy he brings to our home.</p>
                </div>
            </li>
            <li class="blessing reveal d1">
                <div class="bl-icon bl-sage"><i aria-hidden="true" class="ph-fill ph-hands-praying"></i></div>
                <div class="bl-body">
                    <h3>Prayer</h3>
                    <p>May he grow in health, wisdom, and the love of God throughout his life.</p>
                </div>
            </li>
            <li class="blessing reveal d2">
                <div class="bl-icon bl-gold"><i aria-hidden="true" class="ph-fill ph-users-three"></i></div>
                <div class="bl-body">
                    <h3>Community</h3>
                    <p>It takes a village — and we are honoured to be part of his from the start.</p>
                </div>
            </li>
        </ul>

    </div>
</section>

<!-- ─ DIVIDER ────────────────────────────── -->
<div class="divider" style="padding: 0 1.25rem; position:relative; z-index:1;">
    <i aria-hidden="true" class="ph-fill ph-star-four"></i>
</div>

<!-- ─ GIFT ──────────────────────────────── -->
<section id="gift" class="gift">
    <div class="gift-inner">

        <div class="gift-header reveal">
            <p class="g-eyebrow">Gift table</p>
            <h2 class="g-h2">Send a blessing.</h2>
        </div>

        @if (($paymentStatus ?? null) === 'success')
            <div class="alert alert-ok reveal">
                <i aria-hidden="true" class="ph-fill ph-check-circle"></i>
                <span>Thank you — your gift was received. Jidenna is so loved.</span>
            </div>
        @elseif (($paymentStatus ?? null) === 'cancel')
            <div class="alert alert-w reveal">
                <i aria-hidden="true" class="ph ph-warning"></i>
                <span>Payment cancelled — choose an amount below whenever you're ready.</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-err reveal">
                <i aria-hidden="true" class="ph ph-warning-circle"></i>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form class="gift-card reveal d1" method="POST" action="{{ route('stripe.checkout') }}">
            @csrf
            <input id="hiddenAmt" type="hidden" name="amount" value="{{ old('amount') }}">

            <fieldset style="border:none;padding:0;margin:0 0 1.25rem;">
                <legend class="f-label" style="float:left;width:100%;margin-bottom:.75rem;">Choose an amount</legend>
                <div class="amounts" style="clear:both;">
                    <button class="amt" type="button" data-amount="25" aria-pressed="false">£25</button>
                    <button class="amt" type="button" data-amount="50" aria-pressed="false">£50</button>
                    <button class="amt" type="button" data-amount="100" aria-pressed="false">£100</button>
                    <button class="amt" type="button" data-amount="200" aria-pressed="false">£200</button>
                </div>
            </fieldset>

            <label class="f-label" for="customAmt">Or enter your own</label>
            <div class="input-row">
                <span class="input-prefix">£</span>
                <input id="customAmt" class="f-input" type="number" min="1" step="1"
                       placeholder="0" value="{{ old('amount') }}" inputmode="numeric">
            </div>

            <label class="f-label" for="msgField">
                Leave a message
                <span style="font-weight:400;letter-spacing:0;text-transform:none;font-size:.75rem;">— optional</span>
            </label>
            <textarea id="msgField" class="f-textarea" name="message" maxlength="500"
                      placeholder="A blessing, prayer, or note for Jidenna…">{{ old('message') }}</textarea>

            <button id="payBtn" class="pay-btn" type="submit" disabled>
                <i aria-hidden="true" class="ph ph-lock-key"></i>
                <span id="payLabel">Choose an amount to continue</span>
            </button>
            <p class="secure-note">
                <i aria-hidden="true" class="ph ph-shield-check"></i>
                Secured by Stripe
            </p>
        </form>

    </div>
</section>

</main>

<!-- ─ FOOTER ─────────────────────────────── -->
<footer class="site-footer">
    <div class="wrap">
        <p class="footer-name">Jidenna</p>
        <p class="footer-copy">With love, from everyone who came to welcome you. ✦</p>
    </div>
</footer>

<script>
    // ── Nav ─────────────────────────────────
    const nav = document.getElementById('nav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });

    // ── Scroll reveal ────────────────────────
    const ro = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) { e.target.classList.add('in'); ro.unobserve(e.target); }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.reveal').forEach(el => ro.observe(el));

    // ── Gift form ────────────────────────────
    const amts    = document.querySelectorAll('.amt');
    const custom  = document.getElementById('customAmt');
    const hidden  = document.getElementById('hiddenAmt');
    const payBtn  = document.getElementById('payBtn');
    const payLbl  = document.getElementById('payLabel');

    function sync(val) {
        const n = parseFloat(val);
        if (n >= 1) {
            hidden.value = Math.floor(n);
            payLbl.textContent = `Pay £${Math.floor(n)} with Stripe`;
            payBtn.disabled = false;
        } else {
            hidden.value = '';
            payLbl.textContent = 'Choose an amount to continue';
            payBtn.disabled = true;
        }
    }

    function pickBtn(chosen) {
        amts.forEach(x => { x.classList.remove('picked'); x.setAttribute('aria-pressed', 'false'); });
        if (chosen) { chosen.classList.add('picked'); chosen.setAttribute('aria-pressed', 'true'); }
    }

    amts.forEach(b => b.addEventListener('click', () => {
        pickBtn(b);
        custom.value = '';
        sync(b.dataset.amount);
    }));
    custom.addEventListener('input', () => {
        pickBtn(null);
        sync(custom.value);
    });

    // Restore on validation error
    sync(hidden.value);
    if (hidden.value) amts.forEach(b => { if (b.dataset.amount === hidden.value) { b.classList.add('picked'); b.setAttribute('aria-pressed', 'true'); } });

    // ── Floating petals ──────────────────────
    (function() {
        const container = document.getElementById('petals');
        const colors = [
            'rgba(247,179,154,.55)',
            'rgba(233,138,161,.45)',
            'rgba(125,160,139,.38)',
            'rgba(217,164,65,.35)',
            'rgba(255,220,200,.6)',
        ];
        const count = window.innerWidth < 600 ? 8 : 14;

        for (let i = 0; i < count; i++) {
            const p = document.createElement('div');
            p.className = 'petal';
            const size = 8 + Math.random() * 14;
            p.style.cssText = [
                `width:${size}px`,
                `height:${size}px`,
                `left:${Math.random() * 100}%`,
                `background:${colors[Math.floor(Math.random()*colors.length)]}`,
                `animation-duration:${12 + Math.random() * 22}s`,
                `animation-delay:${Math.random() * 18}s`,
                `border-radius:${40 + Math.random()*30}% ${30 + Math.random()*30}% ${40 + Math.random()*30}% ${30 + Math.random()*30}%`,
                `filter:blur(${Math.random() < .4 ? 1.5 : 0}px)`,
            ].join(';');
            container.appendChild(p);
        }
    })();
</script>

</body>
</html>
