<?php
session_start();
require '../../class/connect2.php';

$sql = "SELECT booking_no, bicycle_no, model, customer_no, `name`, `startDate`, `endDate`, price, bo.status, fine, fine_reason "
        . "FROM booking bo "
        . "LEFT JOIN bicycle bi on bi.`bicycleID`=bo.bicycle_no "
        . "LEFT JOIN customer c on c.matric=bo.customer_no;";

$result = mysqli_query($con, $sql);
?>
<table class="table table-bordered" cellspacing="0" width="100%" id="staffTable">
    <thead>
        <tr>
            <th>Booking No</th>
            <th>Bicycle ID</th>
            <th>Bicycle Model</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Price</th>
            <th>Status</th>
            <th>Fine</th>
            <th>Fine Reason</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Booking No</th>
            <th>Bicycle ID</th>
            <th>Bicycle Model</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Price</th>
            <th>Status</th>
            <th>Fine</th>
            <th>Fine Reason</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        while ($obj = mysqli_fetch_object($result)) {
            $trClass ="";
            if(strcasecmp($obj->status, "Taken")==0){
                $trClass="warning";
            }
            else if(strcasecmp($obj->status, "Completed")==0){
                $trClass="success";
            }
            else if(strcasecmp($obj->status, "Canceled")==0){
                $trClass="danger";
            }
        ?>
        <tr class="<?=$trClass?>">
                <td><?=$obj->booking_no?></td>
                <td><?=$obj->bicycle_no?></td>
                <td><?=$obj->model?></td>
                <td><?=$obj->customer_no?></td>
                <td><?=$obj->name?></td>
                <td><?=$obj->startDate?></td>
                <td><?=$obj->endDate?></td>
                <td><?=$obj->price?></td>
                <td><?=$obj->status?></td>
                <td><?=$obj->fine?></td>
                <td><?=$obj->fine_reason?></td>
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
