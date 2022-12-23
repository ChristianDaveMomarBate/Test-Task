<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gleent Test Task</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="<?php echo base_url('filter'); ?>">
                    <div class="row">
                        <div class="col-2">
                            <input type="text" name="search" placeholder="Search Employee" class="form-control" id="myInput" onkeyup="myFunction()">
                        </div>
                        <div class="col-2">
                            <select name="filter_value" id="filter_value" class="form-control">
                                <option hidden value="">All Department</option>
                                <option value="Online Tutorial Department">Online Tutorial Department</option>
                                <option value="Sales">Sales</option>
                                <option value="International Department">International Department</option>
                                <option value="Inter Agency Department">Inter Agency Department</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <select name="position-s" id="position-s" class="form-control">
                                <option hidden value="All">All Position</option>
                                <option value="CEO">CEO</option>
                                <option value="Finance Analyst">Finance Analyst</option>
                                <option value="Sales Staff">Sales Staff</option>
                                <option value="HR Assistant">HR Assistant</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <select name="status-s" id="status-s" class="form-control">
                                <option hidden value="All">All Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Resigned">Resigned</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <input type="submit" class="form-control btn btn-primary" name="filter-user" value="Filter">
                        </div>
                </form>
                <div class="col-2">
                    <input class="form-control btn btn-primary" type="button" name="add-user" value="Add User" data-toggle="modal" data-target="#add-employee">
                </div>
            </div>
            <div class="row">
                    <div class="col-6">
                        <small>By name only to prevent redundancy on filtering...</small> 
                    </div>
                </div>
            <br>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>
                            <div class="checkbox">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </div>
                        </th>
                        <th>Employee Code</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Hired Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users) : ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <input type="checkbox" id="tr-checkbox1">
                                        <label for="tr-checkbox1"></label>
                                    </div>
                                </td>
                                <td><?php echo $user['employee-code']; ?></td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['department']; ?></td>
                                <td><?php echo $user['position']; ?></td>
                                <td><?php echo $user['hired-date']; ?></td>
                                <td><?php echo $user['status']; ?></td>
                                <td hidden><?php echo $user['id']; ?></td>
                                <td>

                                    <a href="" data-toggle="modal" data-target="#edit-employee" class="btn btn-primary btn-sm editbtn">Edit</a>
                                    <a onclick="return confirm('Are you sure you want to delete this data?');" href="<?php echo base_url('delete/' . $user['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <!-- Modal ADD -->
    <div class="modal fade" id="add-employee" tabindex="-1" role="dialog" aria-labelledby="add-employee" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-employee">Add employee here!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="add_create" name="add_create" action="<?= site_url('/submit-form') ?>">
                    <div class="modal-body">
                        <input type="text" name="code" id="code" class="form-control" placeholder="Code">
                        <small class="form-text text-muted">Please enter the employee code.</small>

                        <input type="text" name="employee-name" id="employee-name" class="form-control" placeholder="Name">
                        <small class="form-text text-muted">Please enter the employee name.</small>

                        <select name="department" id="department" class="form-control">
                            <option value="Online Tutorial Department">Online Tutorial Department</option>
                            <option value="Sales">Sales</option>
                            <option value="International Department">International Department</option>
                            <option value="Inter Agency Department">Inter Agency Department</option>
                        </select>
                        <small class="form-text text-muted">Please enter the employee department.</small>

                        <select name="position" id="position" class="form-control">
                            <option value="CEO">CEO</option>
                            <option value="Finance Analyst">Finance Analyst</option>
                            <option value="Sales Staff">Sales Staff</option>
                            <option value="HR Assistant">HR Assistant</option>
                        </select>
                        <small class="form-text text-muted">Please enter the employee position.</small>

                        <input type="date" name="hired-date" id="hired-date" class="form-control" placeholder="Hired Date">
                        <small class="form-text text-muted">Please enter the employee hired date.</small>

                        <select hidden name="status" id="status" class="form-control" placeholder="Status">
                            <option selected disabled value="Active">Active</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="btnadd" class=" btnadd btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Modal EDIT -->
    <div class="modal fade" id="edit-employee" tabindex="-1" role="dialog" aria-labelledby="edit-employee" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-employee">Edit employee here!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="update_user" name="update_user" action="<?= site_url('/update') ?>">
                    <div class="modal-body">
                        <input type="text" hidden name="id" id="id" class="id">

                        <input type="text" hidden name="code-edit" id="code-edit" class="form-control code-edit" placeholder="Code">
                        <small class="form-text text-muted">Please enter the employee code.</small>

                        <input type="text" name="employee-name-edit" id="employee-name-edit" class="form-control employee-name-edit" placeholder="Name">
                        <small class="form-text text-muted">Please enter the employee name.</small>

                        <select name="department-edit" id="department-edit" class="form-control">
                            <option value="Online Tutorial Department">Online Tutorial Department</option>
                            <option value="Sales">Sales</option>
                            <option value="International Department">International Department</option>
                            <option value="Inter Agency Department">Inter Agency Department</option>
                        </select>
                        <small class="form-text text-muted">Please enter the employee department.</small>

                        <select name="position-edit" id="position-edit" class="form-control">
                            <option value="CEO">CEO</option>
                            <option value="Finance Analyst">Finance Analyst</option>
                            <option value="Sales Staff">Sales Staff</option>
                            <option value="HR Assistant">HR Assistant</option>
                        </select>
                        <small class="form-text text-muted">Please enter the employee position.</small>

                        <input type="date" name="hired-date-edit" id="hired-date-edit" class="form-control" placeholder="Hired Date">
                        <small class="form-text text-muted">Please enter the employee hired date.</small>

                        <select name="status-edit" id="status-edit" class="form-control">
                            <option hidden value="No Status Selected">All Status</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Resigned">Resigned</option>
                        </select>
                        <small class="form-text text-muted">Please enter the employee status.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->




</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>\

<!-- Search employee -->
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<script>
    $(document).ready(function() {
        var $selectAll = $('#selectAll'); // main checkbox inside table thead
        var $table = $('.table'); // table selector 
        var $tdCheckbox = $table.find('tbody input:checkbox'); // checboxes inside table body
        var tdCheckboxChecked = 0; // checked checboxes

        // Select or deselect all checkboxes depending on main checkbox change
        $selectAll.on('click', function() {
            $tdCheckbox.prop('checked', this.checked);
        });

        // Toggle main checkbox state to checked when all checkboxes inside tbody tag is checked
        $tdCheckbox.on('change', function(e) {
            tdCheckboxChecked = $table.find('tbody input:checkbox:checked').length; // Get count of checkboxes that is checked
            // if all checkboxes are checked, then set property of main checkbox to "true", else set to "false"
            $selectAll.prop('checked', (tdCheckboxChecked === $tdCheckbox.length));
        })
    });
</script>

<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {

            $('#edit-employee').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            $('#id').val(data[7]);
            $('#code-edit').val(data[1]);
            $('#employee-name-edit').val(data[2]);
            $('#department-edit').val(data[3]);
            $('#position-edit').val(data[4]);
            $('#hired-date-edit').val(data[5]);
            $('#status-edit').val(data[6]);

        });
    });
</script>

</html>