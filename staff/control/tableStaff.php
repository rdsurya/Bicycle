<?php
session_start();
require '../../class/connect2.php';

$sql = "Select id,name, email, user_level, status from user;";

$result = mysqli_query($con, $sql);
?>
<table class="table table-bordered" cellspacing="0" width="100%" id="staffTable">
    <thead>
        <tr>
            <th style="width:5%">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Level</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Level</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        while ($obj = mysqli_fetch_object($result)) {
            $td_class = "";
            $tLevel = "";

            if (strcasecmp($obj->status, "active") == 0) {
                $td_class = "";
            } else if (strcasecmp($obj->status, "not active") == 0) {
                $td_class = "danger";
            }

            if ($obj->user_level == 0) {
                $tLevel = "Admin";
            } else {
                $tLevel = "Staff";
            }
            ?>
            <tr class="<?= $td_class ?>">
                <td><?=$obj->id?></td>
                <td><?=$obj->name?></td>
                <td><?=$obj->email?></td>
                <td><?=$tLevel?></td>
                <td><?=$obj->status?></td>
                <td>
                    <input type="hidden" id="s_obj" value='<?= json_encode($obj) ?>'>
                    <div class="btn-group">
                        <span>
                            <button id="s_btnUpdateModal" class="btn btn-sm btn-success"><i class="fa fa-pencil-square"></i> Update</button>
                        </span>
                        <span>
                            <button id="s_btnDelete" class="btn btn-sm btn-danger" ><i class="fa fa-times"></i> Delete</button>
                        </span>

                    </div>
                </td>
            </tr>
            <?php
        }//end while
        ?>

    </tbody>
</table>

<script>
    $(function () {
        // Setup - add a text input to each footer cell
        $('#staffTable tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="Search ' + title + '" />');
        });

        var table = $('#staffTable').DataTable({
            lengthChange: false,
            dom: 'Bfrtip',
            buttons: ['copy',
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {search: 'applied'}
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {search: 'applied'}
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible',
                        modifier: {search: 'applied'}
                    }
                },
                'colvis'
            ]
        });

        // Apply the search
        table.columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                            .search(this.value)
                            .draw();
                }
            });
        });

        table.buttons().container()
                .appendTo('#bookingTable_wrapper .col-sm-6:eq(0)');
    });

</script>
<?php
        mysqli_close($con);
?>
