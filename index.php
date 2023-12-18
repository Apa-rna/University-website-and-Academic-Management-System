<?php include('admin/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>VIT-AP Student Study Center Mananagement System </title>
    <!-- Favicon-->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid">


        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="studentprofile.html" class="nav-item nav-link">Student Profile</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="course.html" class="nav-item nav-link">Courses</a>
                        <a href="teacher.html" class="nav-item nav-link">Faculty</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>


                    </div>

                </div>
            </nav>
        </div>
    </div>
    </div>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light" style="font-size:30px;">SSCMS</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Home</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="admin/">Admin</a>

            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active" style="font-size:30px;"> VIT-AP Student Study Center Mananagement System </li>


                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid" style="padding-top:2%;">
                <p> VIT's SSCMS is a web-based application developed using PHP and MySQL. In this project administrator can add the students and assign the desk for study.</p>
                <p>
                <h5> Desks Status</h5>
                <hr />
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Desk Number</th>
                            <th>Laptop / Charger Socket</th>
                            <th>Current Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT * from tbldesk ";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                                <tr>
                                    <td><?php echo htmlentities($cnt); ?></td>
                                    <td><?php echo htmlentities($row->deskNumber); ?></td>
                                    <td><?php $lapchargerscoket = $row->laptopChargerScoket;
                                        if ($lapchargerscoket == '') : echo "<span style='color:red'>Not Available</span>";
                                        else : echo "<span style='color:green'>Available</span>";
                                        endif; ?></td>

                                    <td><?php $occupiedstatus = $row->isOccupied;
                                        if ($occupiedstatus == '') : echo "<span style='color:green'>Available</span>";
                                        else : echo "<span style='color:red'>Occupied</span>";
                                        endif; ?></td>
                                </tr>
                        <?php $cnt++;
                            }
                        } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>