<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            display: grid;
            place-items: center;
            font-family: Inter, system-ui, sans-serif;
            color: #2e2620;
            background: #fffaf0;
        }
        .panel {
            width: min(100% - 2rem, 28rem);
            padding: 2rem;
            border: 1px solid rgba(46,38,32,.1);
            border-radius: 1.25rem;
            background: rgba(255,255,255,.74);
            box-shadow: 0 24px 70px rgba(107,82,63,.12);
        }
        h1 { margin: 0 0 1.25rem; font-size: 1.6rem; }
        label { display: block; margin: 1rem 0 .4rem; font-weight: 700; font-size: .85rem; }
        input {
            width: 100%;
            padding: .85rem 1rem;
            border: 1.5px solid rgba(46,38,32,.14);
            border-radius: .8rem;
            font: inherit;
        }
        button {
            width: 100%;
            margin-top: 1.3rem;
            padding: .9rem 1rem;
            border: 0;
            border-radius: 999px;
            background: #2f6f61;
            color: white;
            font-weight: 800;
            cursor: pointer;
        }
        .error {
            margin: 0 0 1rem;
            padding: .8rem 1rem;
            border-radius: .8rem;
            background: rgba(233,138,161,.12);
            color: #a33758;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <form class="panel" method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <h1>Gift Admin</h1>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <label for="email">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" autocomplete="current-password" required>

        <button type="submit">Log in</button>
    </form>
</body>
</html>
