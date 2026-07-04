<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jidenna Is Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --milk: #fffaf0;
            --cream: #fff3d9;
            --peach: #f7b39a;
            --rose: #e98aa1;
            --sage: #7da08b;
            --ink: #2e2620;
            --muted: #786b60;
            --gold: #d9a441;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 12% 12%, rgba(247, 179, 154, .36), transparent 28rem),
                radial-gradient(circle at 86% 8%, rgba(125, 160, 139, .25), transparent 24rem),
                linear-gradient(135deg, var(--milk), var(--cream) 52%, #fff8ec);
        }

        .page-shell {
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }

        .page-shell::before,
        .page-shell::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, .64);
            filter: blur(2px);
            pointer-events: none;
        }

        .page-shell::before {
            width: 17rem;
            height: 17rem;
            right: -6rem;
            top: 18rem;
        }

        .page-shell::after {
            width: 13rem;
            height: 13rem;
            left: -4rem;
            bottom: 8rem;
        }

        .site-nav {
            position: relative;
            z-index: 2;
            padding: 1.2rem 0;
        }

        .brand-mark {
            display: inline-flex;
            align-items: center;
            gap: .65rem;
            color: var(--ink);
            font-weight: 800;
        }

        .brand-icon {
            display: grid;
            width: 2.65rem;
            height: 2.65rem;
            place-items: center;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(145deg, var(--rose), var(--peach));
            box-shadow: 0 12px 30px rgba(233, 138, 161, .28);
        }

        .hero {
            position: relative;
            z-index: 2;
            padding: 3rem 0 4rem;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .45rem .8rem;
            border: 1px solid rgba(46, 38, 32, .12);
            border-radius: 999px;
            background: rgba(255, 255, 255, .55);
            color: var(--sage);
            font-size: .82rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        h1 {
            max-width: 11ch;
            margin: 1.1rem 0 1rem;
            font-family: Fraunces, Georgia, serif;
            font-size: clamp(3.1rem, 9vw, 7.3rem);
            line-height: .9;
            letter-spacing: 0;
        }

        .lead-copy {
            max-width: 38rem;
            color: var(--muted);
            font-size: clamp(1.05rem, 2vw, 1.28rem);
            line-height: 1.75;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: .8rem;
            margin-top: 1.6rem;
        }

        .btn-blessing,
        .btn-soft {
            min-height: 3.25rem;
            border-radius: 999px;
            padding: .85rem 1.35rem;
            font-weight: 800;
        }

        .btn-blessing {
            border: 0;
            color: #fff;
            background: linear-gradient(135deg, #2f6f61, #d9a441);
            box-shadow: 0 18px 42px rgba(47, 111, 97, .24);
        }

        .btn-soft {
            border: 1px solid rgba(46, 38, 32, .13);
            color: var(--ink);
            background: rgba(255, 255, 255, .66);
        }

        .baby-card {
            position: relative;
            max-width: 28rem;
            margin-left: auto;
            padding: 1.2rem;
            border: 1px solid rgba(46, 38, 32, .1);
            border-radius: 1.8rem;
            background: rgba(255, 255, 255, .72);
            box-shadow: 0 24px 80px rgba(123, 91, 72, .16);
            backdrop-filter: blur(16px);
        }

        .baby-portrait {
            position: relative;
            min-height: 22rem;
            overflow: hidden;
            border-radius: 1.35rem;
            background: #f8dfbd;
        }

        .baby-portrait img {
            width: 100%;
            height: 100%;
            min-height: 22rem;
            object-fit: cover;
        }

        .floating-note {
            position: absolute;
            right: 1.3rem;
            bottom: 1.3rem;
            max-width: 11.5rem;
            padding: .9rem;
            border-radius: 1rem;
            background: rgba(255, 255, 255, .82);
            color: var(--muted);
            font-size: .9rem;
            font-weight: 700;
            box-shadow: 0 14px 36px rgba(46, 38, 32, .13);
        }

        .section-band {
            position: relative;
            z-index: 2;
            padding: 4rem 0;
            background: rgba(255, 255, 255, .38);
            border-top: 1px solid rgba(46, 38, 32, .08);
            border-bottom: 1px solid rgba(46, 38, 32, .08);
        }

        .section-title {
            font-family: Fraunces, Georgia, serif;
            font-size: clamp(2rem, 5vw, 3.8rem);
            line-height: 1;
        }

        .gift-panel {
            padding: 1.25rem;
            border: 1px solid rgba(46, 38, 32, .1);
            border-radius: 1.3rem;
            background: rgba(255, 255, 255, .72);
            box-shadow: 0 20px 70px rgba(107, 82, 63, .14);
        }

        .amount-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: .75rem;
        }

        .amount-option {
            min-height: 3.6rem;
            border: 1px solid rgba(46, 38, 32, .12);
            border-radius: .9rem;
            background: #fff;
            color: var(--ink);
            font-size: 1.05rem;
            font-weight: 800;
            transition: transform .18s ease, border-color .18s ease, box-shadow .18s ease;
        }

        .amount-option:hover,
        .amount-option.active {
            transform: translateY(-2px);
            border-color: rgba(217, 164, 65, .8);
            box-shadow: 0 12px 26px rgba(217, 164, 65, .2);
        }

        .custom-amount {
            min-height: 3.55rem;
            border-color: rgba(46, 38, 32, .12);
            border-radius: .9rem;
            font-weight: 800;
        }

        .message-note {
            min-height: 7rem;
            border-color: rgba(46, 38, 32, .12);
            border-radius: .9rem;
            resize: vertical;
        }

        .custom-amount:focus,
        .message-note:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 .22rem rgba(217, 164, 65, .16);
        }

        .pay-note {
            color: var(--muted);
            font-size: .92rem;
        }

        .memory-list {
            display: grid;
            gap: .85rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .memory-list li {
            padding: .95rem 1rem;
            border-left: 4px solid var(--peach);
            border-radius: .75rem;
            background: rgba(255, 255, 255, .58);
            color: var(--muted);
            font-weight: 600;
        }

        footer {
            position: relative;
            z-index: 2;
            padding: 2rem 0;
            color: var(--muted);
        }

        @media (max-width: 991px) {
            .baby-card {
                margin: 2rem auto 0;
            }
        }

        @media (max-width: 575px) {
            .hero {
                padding-top: 1.5rem;
            }

            .baby-portrait {
                min-height: 18rem;
            }

            .baby-portrait img {
                min-height: 18rem;
            }

            .amount-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="page-shell">
        <nav class="site-nav">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="brand-mark text-decoration-none" href="#">
                    <span class="brand-icon">J</span>
                    <span>Jidenna's Dedication</span>
                </a>
                <a class="btn btn-soft" href="#gift">Give a Gift</a>
            </div>
        </nav>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-7">
                            <span class="eyebrow">Baby dedication celebration</span>
                            <h1>Jidenna is here.</h1>
                            <p class="lead-copy">
                                Let us welcome Jidenna with joy, prayer, and love. Today we celebrate a precious new life,
                                a beautiful blessing, and the beginning of many bright family memories.
                            </p>
                            <div class="hero-actions">
                                <a class="btn btn-blessing" href="#gift">Send a Blessing</a>
                                <a class="btn btn-soft" href="#message">Read the Welcome</a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="baby-card">
                                <div class="baby-portrait">
                                    <img src="{{ asset('images/jidenna-dedication-hero.png') }}" alt="Baby dedication gifts arranged on a soft cream blanket">
                                    <div class="floating-note">Welcome, little star. You are loved already.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="message" class="section-band">
                <div class="container">
                    <div class="row g-4 align-items-start">
                        <div class="col-lg-6">
                            <h2 class="section-title">A day of love, family, and thanksgiving.</h2>
                        </div>
                        <div class="col-lg-6">
                            <ul class="memory-list">
                                <li>We thank God for the gift of Jidenna and the joy he brings.</li>
                                <li>We surround him with prayers for health, wisdom, peace, and purpose.</li>
                                <li>We celebrate with family and friends who are part of his story from the start.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section id="gift" class="py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center mb-4">
                                <span class="eyebrow">Gift table</span>
                                <h2 class="section-title mt-3">Choose a blessing amount.</h2>
                                <p class="lead-copy mx-auto">
                                    Select a fixed amount or type your own gift amount before using the pay button.
                                </p>
                            </div>

                            @if (($paymentStatus ?? null) === 'success')
                                <div class="alert alert-success border-0 shadow-sm" role="alert">
                                    Thank you. Your gift for Jidenna's dedication was received successfully.
                                </div>
                            @elseif (($paymentStatus ?? null) === 'cancel')
                                <div class="alert alert-warning border-0 shadow-sm" role="alert">
                                    Payment was cancelled. You can choose an amount and try again whenever you are ready.
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger border-0 shadow-sm" role="alert">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form class="gift-panel" method="POST" action="{{ route('stripe.checkout') }}">
                                @csrf
                                <input id="selectedAmount" type="hidden" name="amount" value="{{ old('amount') }}">

                                <div class="amount-grid mb-3">
                                    <button class="amount-option" type="button" data-amount="25">&pound;25</button>
                                    <button class="amount-option" type="button" data-amount="50">&pound;50</button>
                                    <button class="amount-option" type="button" data-amount="100">&pound;100</button>
                                    <button class="amount-option" type="button" data-amount="200">&pound;200</button>
                                </div>

                                <label for="customAmount" class="form-label fw-bold">Or enter your own amount</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">&pound;</span>
                                    <input id="customAmount" class="form-control custom-amount" type="number" min="1" step="1" placeholder="Enter amount" value="{{ old('amount') }}">
                                </div>

                                <label for="babyMessage" class="form-label fw-bold">Leave a message for Jidenna</label>
                                <textarea id="babyMessage" class="form-control message-note mb-3" name="message" maxlength="500" placeholder="Write a short blessing, prayer, or note for the baby and family.">{{ old('message') }}</textarea>

                                <button id="payButton" class="btn btn-blessing w-100" type="submit" disabled>Choose an amount to continue</button>
                                <p class="pay-note mt-3 mb-0 text-center">
                                    You will be redirected to Stripe Checkout to complete your secure payment.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="container text-center">
                With love for Jidenna and the family.
            </div>
        </footer>
    </div>

    <script>
        const amountButtons = document.querySelectorAll('.amount-option');
        const customAmount = document.querySelector('#customAmount');
        const selectedAmount = document.querySelector('#selectedAmount');
        const payButton = document.querySelector('#payButton');

        function setAmount(amount) {
            const cleanAmount = Number(amount);

            if (cleanAmount > 0) {
                selectedAmount.value = Math.floor(cleanAmount);
                payButton.textContent = `Pay \u00a3${selectedAmount.value} with Stripe`;
                payButton.dataset.amount = selectedAmount.value;
                payButton.disabled = false;

                return;
            }

            selectedAmount.value = '';
            payButton.textContent = 'Choose an amount to continue';
            payButton.removeAttribute('data-amount');
            payButton.disabled = true;
        }

        amountButtons.forEach((button) => {
            button.addEventListener('click', () => {
                amountButtons.forEach((item) => item.classList.remove('active'));
                button.classList.add('active');
                customAmount.value = '';
                setAmount(button.dataset.amount);
            });
        });

        customAmount.addEventListener('input', () => {
            amountButtons.forEach((item) => item.classList.remove('active'));
            setAmount(customAmount.value);
        });

        setAmount(selectedAmount.value);
    </script>
</body>
</html>
