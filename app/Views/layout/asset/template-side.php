<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/css/side.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f999092ac9.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center"><img src="sdm-polri.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h4 class="m-0">Jason Doe</h4>
                    <p class="font-weight-light text-muted mb-0">Web developer</p>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic bg-light">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    About
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic">
                    <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                    Services
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic">
                    <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                    Gallery
                </a>
            </li>
        </ul>

        <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic">
                    <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                    Area charts
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic">
                    <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                    Bar charts
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic">
                    <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                    Pie charts
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark font-italic">
                    <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                    Line charts
                </a>
            </li>
        </ul>
    </div>
    <!-- End vertical navbar -->


    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars"></i></button>

        <!-- Demo content -->
        <h2 class="display-4 text-white">Bootstrap vertical nav</h2>
        <p class="lead text-white mb-0">Build a fixed sidebar using Bootstrap 4 vertical navigation and media objects.</p>
        <p class="lead text-white">Snippet by <a href="https://bootstrapious.com/snippets" class="text-white">
                <u>Bootstrapious</u></a>
        </p>
        <div class="separator"></div>

        <div class="card">
            <div class="card-body">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col">
                        <h2 class="py-3 text-center font-bold font-up blue-text">Table with pagination</h2>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
                <!--Table-->
                <table class="table table-hover table-responsive mb-2">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th class="th-lg"><a>First Name</a></th>
                            <th class="th-lg"><a href="">Last Name</a></th>
                            <th class="th-lg"><a href="">Username</a></th>
                            <th class="th-lg"><a href="">Username</a></th>
                            <th class="th-lg"><a href="">Username</a></th>
                            <th class="th-lg"><a href="">Username</a></th>
                        </tr>
                    </thead>
                    <!--Table head-->
                    <!--Table body-->
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Paul</td>
                            <td>Topolski</td>
                            <td>@P_Topolski</td>
                            <td>Paul</td>
                            <td>Topolski</td>
                            <td>@P_Topolski</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                    <!--Table body-->
                </table>
                <!--Bottom Table UI-->
                <div class="d-flex justify-content-center">
                    <!--Pagination -->
                    <nav class="my-4 pt-2">
                        <ul class="pagination pagination-circle pg-blue mb-0">
                            <!--First-->
                            <li class="page-item disabled clearfix d-none d-md-block"><a class="page-link">First</a></li>
                            <!--Arrow left-->
                            <li class="page-item disabled">
                                <a class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <!--Numbers-->
                            <li class="page-item active"><a class="page-link">1</a></li>
                            <li class="page-item"><a class="page-link">2</a></li>
                            <li class="page-item"><a class="page-link">3</a></li>
                            <li class="page-item"><a class="page-link">4</a></li>
                            <li class="page-item"><a class="page-link">5</a></li>
                            <!--Arrow right-->
                            <li class="page-item">
                                <a class="page-link" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <!--First-->
                            <li class="page-item clearfix d-none d-md-block"><a class="page-link">Last</a></li>
                        </ul>
                    </nav>
                    <!--/Pagination -->
                </div>
                <!--Bottom Table UI-->
            </div>
        </div>

        <div class="row text-white">
            <div class="">
                <div class="bg-white p-5 rounded my-5 shadow-sm">
                    <p class="lead font-italic mb-0 text-muted">"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                </div>

            </div>
            <div class="col-lg-5">

            </div>
        </div>

    </div>
    <!-- End demo content -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script>
        $(function() {
            // Sidebar toggle behavior
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>


</body>

</html>