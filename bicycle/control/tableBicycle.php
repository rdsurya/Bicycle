<?php
session_start();
require '../../class/connect2.php';

$sql = "Select bicycleID, type, model, status from bicycle;";

$result = mysqli_query($con, $sql);
?>
<table class="table table-bordered" cellspacing="0" width="100%" id="staffTable">
    <thead>
        <tr>
            <th>Bicycle No</th>
            <th>Type</th>
            <th>Model</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Bicycle No</th>
            <th>Type</th>
            <th>Model</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        while ($obj = mysqli_fetch_object($result)) {
            $td_class = "";

            if (strcasecmp($obj->status, "available") != 0) {
                $td_class = "warning";
            }
            ?>
            <tr class="<?= $td_class ?>">
                <td><?= $obj->bicycleID ?></td>
                <td><?= $obj->type ?></td>
                <td><?= $obj->model ?></td>
                <td><?= $obj->status ?></td>
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

