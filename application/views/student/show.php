<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <h3 class="text-center mt-5 mb-3"><?php echo $title; ?></h3>

            <div class="card">
                <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="text-primary"><i class="fa fa-user"></i>Student ID</td>
                            <td><?php echo $student->nim; ?></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><i class="fa fa-list-ol"></i>Full Name</td>
                            <td><?php echo $student->name; ?></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><i class="fa fa-book"></i>Gender</td>
                            <td><?php echo $student->gender; ?></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><i class="fa fa-group"></i>Birth Date</td>
                            <td><?php echo $student->birthdate; ?></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><i class="fa fa-university"></i>Email</td>
                            <td><?php echo $student->email; ?></td>
                        </tr>
                        <tr>
                            <td class="text-primary"><i class="fa fa-university"></i>Phone Number</td>
                            <td><?php echo $student->phone; ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-secondary d-flex justify-content-end mt-4">
                    <small>Created at : <?= $student->created_at ?></small>
                </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                    <a href="<?php echo base_url('student') ?>" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
    </div>
    
</div>
