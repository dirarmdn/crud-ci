<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Student ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Birth Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody id="search-results">
            <?php 
            $no = $offset;
            foreach ($students as $key => $s) { ?>
            <tr id="data">
                <td><?= ++$no;?></td>
                <td><?= $s->nim ?></td>
                <td><?= $s->name ?></td>
                <td><?= $s->gender ?></td>
                <td><?= $s->email ?></td>
                <td><?= $s->birthdate ?></td>
                <td>
                    <a class="btn btn-outline-info"
                        href="<?= base_url('student/show/' . $s->id) ?>">
                        Show
                    </a>
                    <a class="btn btn-outline-success"
                        href="<?= base_url('student/edit/' . $s->id) ?>">
                        Edit
                    </a>
                    <button type="button" data-id="<?= $s->id ?>"
                        class="btn btn-outline-danger delete">
                        Delete
                    </button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center">
    <p><?=$link ?></p>
</div>