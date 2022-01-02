<?php
include 'backend/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services Data</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>

<body>
    <div class="container">
        <p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-xs-2 col-md-1">
                        <a href="my project.php"><i class="material-icons home">home</i></a>
                    </div>
                    <div class="col-xs-10 col-md-5">
                        <h2>Manage <b>Services</b></h2>
                    </div>
                    <div class="col-xs-8 col-md-6">
                        <a href="#addServiceModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Service</span></a>
                        <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>S.NO</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Contact Person</th>
                            <th>Contact No</th>
                            <th>Dates Available</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM service");
                        $i = 1;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr id="<?php echo $row["sno"]; ?>">
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" class="user_checkbox" data-user-sno="<?php echo $row["sno"]; ?>">
                                        <label for="checkbox2"></label>
                                    </span>
                                </td>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["service"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><?php echo $row["contact_person"]; ?></td>
                                <td><?php echo $row["contact_no"]; ?></td>
                                <td><?php echo $row["dates_available"]; ?></td>
                                <td>
                                    <a href="#editServiceModal" class="edit" data-toggle="modal">
                                        <i class="material-icons update" data-toggle="tooltip" data-sno="<?php echo $row["sno"]; ?>" data-service="<?php echo $row["service"]; ?>" data-price="<?php echo $row["price"]; ?>" data-person="<?php echo $row["contact_person"]; ?>" data-number="<?php echo $row["contact_no"]; ?>" data-dates="<?php echo $row["dates_available"]; ?>" title="Edit">&#xE254;</i>
                                    </a>
                                    <a href="#deleteServiceModal" class="delete" data-sno="<?php echo $row["sno"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addServiceModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Service</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="form-group"> -->

                        <div class="form-group">
                            <label>Service</label>
                            <input type="text" id="service" name="service" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" id="price" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input type="text" id="contactperson" name="contactperson" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="number" id="contactnumber" name="contactnumber" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Dates Available</label>
                            <input type="date" id="dates" name="dates" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success" id="btn-add">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editServiceModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="update_form">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Service</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="sno_u" name="sno" class="form-control" required>
                        <div class="form-group">
                            <label>Service</label>
                            <input type="text" id="service_u" name="service" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" id="price_u" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contact Person</label>
                            <input type="text" id="contactperson_u" name="contactperson" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contact No</label>
                            <input type="number" id="contactnumber_u" name="contactnumber" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Dates Available</label>
                            <input type="date" id="dates_u" name="dates" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="2" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-info" id="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteServiceModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>

                    <div class="modal-header">
                        <h4 class="modal-title">Delete Service</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="sno_d" name="sno" class="form-control">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-danger" id="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="page-footer">
        <div class="footer-copyright grey darken-4">
            <div class="container center-align">&copy;2019 Njoy Life</div>
        </div>
    </footer>

</body>


</html>