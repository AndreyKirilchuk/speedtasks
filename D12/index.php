<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Video List Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h1 class="h2 py-5 text-center">Video List</h1>

    <div class="row">

        <?php
            $files = fopen('videos.json', "r");

            $data = fread($files, filesize('videos.json'));

            fclose($files);

            $data = json_decode($data, true);

            foreach ($data as $file)
            {

                $title = $file["title"];
                $views = number_format($file["views"]);
                $duration = $file["duration"];
                $preview = $file["preview"];
                $patch = $preview . ".gif";

                echo
                '
                
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-lg mb-4">
                        <div class="card-header py-3">
                            <span class="h6 fw-bold">'.$title.'</span>
                        </div>
                        <img src="./previews/'.$patch.'" alt="'.$patch.'" class="card-img rounded-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="icon icon-clock me-2"></i>
                                <span class="me-3">'.$duration.'</span>
                                <i class="icon icon-eye me-2"></i>
                                <span>'.$views.'</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                ';
            }

        ?>
    </div>
</div>

    <script>
        document.querySelectorAll('.card-img').forEach(e => {
            e.addEventListener('mouseenter', () => {
                e.src = "previews/" + e.alt;
            });

            e.addEventListener('mouseleave', () => {
                e.src = "previews/" + e.alt;
            });
        })
    </script>
</body>
</html>