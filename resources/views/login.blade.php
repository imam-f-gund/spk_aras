<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/svg/logo.svg') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

    <style>
        .login-header {
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;

        }

        .form-btn {
            margin-top: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">

            <form class="sign-up-form form mt-5" action="cek-login" method="POST">
                @csrf
                <div class="row">
                    <div class="col text-center">
                        <h2 class="fw-bold text-center mb-3">Sistem Pemilihan Guru Terbaik</h2>
                        <h3 class="fw-bold login-header">
                            SMK Negeri 1 Jetis
                        </h3>
                    </div>
                </div>
                <label class="form-label-wrapper">
                    <p class="form-label">Username</p>
                    <input class="form-input" type="text" placeholder="Enter your username" name="username" required>
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input class="form-input" type="password" placeholder="Enter your password" name="password"
                        required>
                </label>

                <button type="submit" class="form-btn primary-default-btn transparent-btn">Masuk</button>
            </form>
        </article>
    </main>
    <!-- Chart library -->
    <script src="{{ asset('plugins/chart.min.js') }}"></script>
    <!-- Icons library -->
    <script src="{{ asset('plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
