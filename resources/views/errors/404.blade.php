<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .error-content {
            text-align: center;
        }

        .error-content h1 {
            font-size: 6rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .error-content p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }

        .lottie-animation {
            max-width: 400px;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>

    <div class="error-container">
        <div class="lottie-animation"></div>
        <div class="error-content">
            <h1>404</h1>
            <p>Oops! The page you're looking for doesn't exist.</p>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">Go to Homepage</a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>
    <script>
        const animation = lottie.loadAnimation({
            container: document.querySelector('.lottie-animation'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: 'https://lottie.host/d987597c-7676-4424-8817-7fca6dc1a33e/BVrFXsaeui.json'
        });
    </script>
</body>

</html>
