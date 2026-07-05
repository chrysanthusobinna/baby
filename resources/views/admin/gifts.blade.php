<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gifts Admin</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Inter, system-ui, sans-serif;
            color: #2e2620;
            background: #fffaf0;
        }
        header, main { width: min(100% - 2rem, 72rem); margin: 0 auto; }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 2rem 0 1rem;
        }
        h1 { margin: 0; font-size: clamp(1.8rem, 5vw, 3rem); }
        .logout {
            border: 1px solid rgba(46,38,32,.14);
            border-radius: 999px;
            background: white;
            padding: .65rem 1rem;
            cursor: pointer;
            font-weight: 700;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(12rem, 1fr));
            gap: 1rem;
            margin: 1rem 0 1.5rem;
        }
        .stat, .gift {
            border: 1px solid rgba(46,38,32,.1);
            border-radius: 1rem;
            background: rgba(255,255,255,.78);
            box-shadow: 0 16px 48px rgba(107,82,63,.09);
        }
        .stat { padding: 1rem; }
        .stat span { display: block; color: #786b60; font-size: .78rem; font-weight: 800; text-transform: uppercase; }
        .stat strong { display: block; margin-top: .25rem; font-size: 1.5rem; }
        .gift { padding: 1.1rem; margin-bottom: .9rem; }
        .gift-top {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
            margin-bottom: .65rem;
        }
        .name { font-weight: 900; }
        .email, .meta, .message { color: #786b60; }
        .status {
            display: inline-flex;
            align-items: center;
            min-height: 1.8rem;
            padding: .25rem .65rem;
            border-radius: 999px;
            background: rgba(125,160,139,.14);
            color: #2f6f61;
            font-size: .78rem;
            font-weight: 900;
            text-transform: uppercase;
        }
        .status.failed, .status.expired { background: rgba(233,138,161,.12); color: #a33758; }
        .message {
            margin-top: .8rem;
            padding: .85rem;
            border-left: 3px solid #d9a441;
            background: rgba(217,164,65,.08);
            border-radius: 0 .75rem .75rem 0;
        }
        .pagination { margin: 1.5rem 0 2.5rem; }
        .empty { padding: 2rem; text-align: center; color: #786b60; }
    </style>
</head>
<body>
    <header>
        <h1>Gifts & Messages</h1>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="logout" type="submit">Log out</button>
        </form>
    </header>

    <main>
        <section class="stats">
            <div class="stat">
                <span>Paid Gifts</span>
                <strong>{{ $paidCount }}</strong>
            </div>
            <div class="stat">
                <span>Total Paid</span>
                <strong>&pound;{{ number_format($totalPaid) }}</strong>
            </div>
        </section>

        @forelse ($gifts as $gift)
            <article class="gift">
                <div class="gift-top">
                    <div>
                        <div class="name">{{ $gift->payer_name ?: 'Name not captured yet' }}</div>
                        <div class="email">{{ $gift->payer_email ?: 'Email not captured yet' }}</div>
                    </div>
                    <div>
                        <strong>&pound;{{ number_format($gift->amount) }}</strong>
                        <span class="status {{ $gift->status }}">{{ $gift->status }}</span>
                    </div>
                </div>

                <div class="meta">
                    {{ $gift->created_at->format('j M Y, g:ia') }}
                    @if ($gift->stripe_checkout_session_id)
                        · {{ $gift->stripe_checkout_session_id }}
                    @endif
                </div>

                @if ($gift->message)
                    <div class="message">{{ $gift->message }}</div>
                @endif

                @if ($gift->stripe_failure_message)
                    <div class="message">{{ $gift->stripe_failure_message }}</div>
                @endif
            </article>
        @empty
            <div class="gift empty">No gifts yet.</div>
        @endforelse

        <div class="pagination">{{ $gifts->links() }}</div>
    </main>
</body>
</html>
