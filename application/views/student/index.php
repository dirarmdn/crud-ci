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
                                placeholder="Search" aria-label="Search" aria-describedby="search-addon" onkeyup="filter();" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                        </form>
                    </div>

                    <a href="<?= base_url('student/create/') ?>" class="btn btn-outline-primary my-auto">+ Add</a>
                </div>
                <div class="card-body p-0" id="div_table">
                   
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

    function filter(url) {
        if(!url) {
            url = '<?= base_url() ?>student/search';
        }
        $.ajax({
            url: url,
            type: 'post',
            data:{
                search : $('#searchInput').val(), 
            },
           // data: $('#search-form').serialize(),
            success: function(response) {
                
                $('#div_table').html(response);
            }
        })
    }

    filter();   
</script>
