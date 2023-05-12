<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <h3 class="text-center mt-5 mb-3"><?= $title; ?></h3>

            <div class="card">
                <div class="card-body">
                    <?php if ($this->session->flashdata('errors')) { ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('errors'); ?>
                        </div>
                    <?php } ?>

                    <form action="<?= base_url('student/update/' . $student->id); ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    
                        <div class="form-outline mb-4">
                            <label class="form-label" for="nim">NIM</label>
                            <input type="text" value="<?= $student->nim; ?>" name="nim" id="nim" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" value="<?= $student->name; ?>" name="name" id="name" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="birthdate">Birth Date</label>
                            <input type="date" value="<?= $student->birthdate; ?>" name="birthdate" id="birthdate" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="gender">Gender</label>
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <?php if ($student->gender == 'Male') { ?>
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                <?php } else { ?>
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" value="<?= $student->email; ?>" name="email" id="email" class="form-control" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="text" value="<?= $student->phone ?>" name="phone" id="phone" class="form-control" maxlength="20" />
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Save Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>