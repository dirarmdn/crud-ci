<nav class="navbar navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Students Management</a>
    </div>
</nav>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h3 class="text-center mt-5 mb-4"><?= $title ?></h3>
            <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success') ?>
            </div>
            <?php } ?>
            <div class="card rounded-3 shadow-sm">

                <div class="card-header d-flex justify-content-between">
                    <div class="col-3">
                        <form class="input-group rounded my-auto" id="search-form">
                            <input type="text" name="search" id="searchInput" class="form-control rounded col-2"
                                placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </form>
                    </div>

                    <a href="<?= base_url('student/create/') ?>" class="btn btn-outline-primary my-auto">+ Add</a>
                </div>
                <div class="card-body p-0">

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
                                <?php foreach ($students as $key => $s) { ?>
                                <tr id="data">
                                    <td><?= $key + 1 ?></td>
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
                        <p><?= $this->pagination->create_links() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('.delete').click(function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this data!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('student/delete/') ?>" + id;
                }
            })
        });
    });

    $(document).ready(function() {
        $('#search-form input[name="search"]').keyup(function() {
            $.ajax({
                url: '<?= base_url() ?>student/search',
                type: 'post',
                data: $('#search-form').serialize(),
                dataType: 'json',
                success: function(response) {
                    var html = '';
                    $.each(response.results, function(index, result) {
                        html += '<tr>';
                        html += '<td>' + (index + 1) + '</td>';
                        html += '<td>' + result.nim + '</td>';
                        html += '<td>' + result.name + '</td>';
                        html += '<td>' + result.gender + '</td>';
                        html += '<td>' + result.email + '</td>';
                        html += '<td>' + result.birthdate + '</td>';
                        html += '<td>';
                        html +=
                            '<a class="btn btn-outline-info" href="<?= base_url('student/show/') ?>' +
                            result.id + '">Show</a> ';
                        html +=
                            '<a class="btn btn-outline-success" href="<?= base_url('student/edit/') ?>' +
                            result.id + '">Edit</a> ';
                        html += '<button type="button" data-id="' + result.id +
                            '" class="btn btn-outline-danger delete">Delete</button> ';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('#search-results').html(html);
                }
            })
        });
    });
</script>
