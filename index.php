<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Fast News</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>
</head>

<body>
    <script type="text/javascript">
        var obj = JSON.stringify({
            'breaking': '1'
        })
        $.ajax({

            url: "action.php",
            type: "POST",
            data: obj,
            success: function(data) {

                var articles = data.articles;
                var divs = "";
                articles.forEach((article) => {
                    divs += `
                        <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="${article.urlToImage
}" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">${article.publishedAt}</div>
                        <h2 class="card-title">${article.title}</h2>
                        <p class="card-text">Author : ${article.source.name}</p>
                        <p class="card-text">${article.description}</p>
                        <a class="btn btn-primary" href="${article.url}" id="readmore">Read more →</a>
                    </div>
                </div>`
                });
                $("#fill").html(divs);
            }

        });
        $(document).on("click", "#srch", function() {
            $("#fill").html('');
            var search = $("#search_news").val();
            var jsn = JSON.stringify({
                'q': search
            });
            $.ajax({
                url: "action.php",
                type: "POST",
                data: jsn,
                success: function(data) {
                    $("#headline").text(`Your searches for "${search}"`)
                    var articles = data.articles;
                    var divs = "";
                    articles.forEach((article) => {
                        divs += `
                        <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="${article.urlToImage
}" alt="assets/image(2).jpg" /></a>
                    <div class="card-body">
                        <div class="small text-muted">${article.publishedAt}</div>
                        <h2 class="card-title">${article.title}</h2>
                        <p class="card-text">Author : ${article.source.name}</p>
                        <p class="card-text">${article.description}</p>
                        <a class="btn btn-primary" href="${article.url}" id="readmore">Read more →</a>
                    </div>
                </div>`
                    });
                    // console.log(divs);
                    $("#fill").html(divs);
                }
            });

        });
    </script>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Fast News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <div class="container-fluid remove-mp mb-4">
        <div class="img-pos">
            <img src="assets/thenews.jpg" width="100%" height="350px" alt="">
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-con">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Fast News!</h1>

                <h5>Very fast, Most authentic</h5>
            </div>
        </div>
    </div>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <h3 id="headline">Top news of the day: Pakistan</h3>
                <!-- Featured blog post-->
                <div id="fill">

                </div>

            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input name="search_news" id="search_news" class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter topic to search" aria-describedby="button-search" />
                            <button id="srch" class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>

                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
