<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Business Insider Outliner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <h6 class="py-3 mb-4 border-bottom"> Outlining:
                    <a href="https://www.businessinsider.com/great-salary-convergence-remote-work-professional-pay-tech-silicon-valley-2022-8?utm_medium=ingest&utm_source=bloomberg"
                        class="link-secondary" target="_blank">
                        https://www.businessinsider.com/great-salary-convergence-remote-work-professional-pay-tech-silicon-valley-2022-8?utm_medium=ingest&utm_source=bloomberg
                    </a>
                </h6>
                <p class="display-2 pb-4 mb-4 border-bottom"><strong>{{ $title }}</strong></p>
                @foreach ($body as [$tag, $content])
                    @if ($tag == 'p')
                        <p>{{ $content }}</p>
                    @endif

                    @if ($tag == 'h2')
                        <h2>{{ $content }}</h2>
                        <p></p>
                    @endif

                    @if ($tag == 'hr')
                        <hr>
                    @endif
                @endforeach
            </div>
        </div>
    </main>
</body>

</html>
