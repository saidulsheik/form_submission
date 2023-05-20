<?php  require "inc/header.php"; ?>
<?php  require "inc/sidebar.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Receipt Report
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Report</li>
        </ol>

        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $from_date=$_POST['from_date'];
                $to_date=$_POST['to_date'];
                   $result =  $db->select("SELECT
                                                *
                                            FROM
                                                receipts
                                            WHERE
                                                DATE(entry_at) BETWEEN '".$from_date."' AND '".$to_date."'");
            }else{
                $from_date=date('Y-m-d');
                $to_date=date('Y-m-d');
                $result = $db->select("SELECT
                        *
                    FROM
                        receipts
                    WHERE
                        DATE(entry_at) BETWEEN '".$from_date."' AND '".$to_date."'");
            }
        ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Report</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form class="form-horizontal" id="transaction_form" method="POST"
                        action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                        <div class="box-body">
                            <div class="form-group col-sm-4">
                                <label for="from_date" class="col-sm-4 control-label">From Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="from_date"
                                        value="<?php echo isset($from_date)?$from_date:date('Y-m-d');?>" id="from_date"
                                        placeholder="Type Only Number">
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="from_date" class="col-sm-4 control-label">To Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="to_date"
                                        value="<?php echo isset($to_date)?$to_date:date('Y-m-d');?>" id="from_date"
                                        placeholder="Type Only Number">
                                </div>
                            </div>

                            <div class="form-group col-sm-4">
                                <div class="col-sm-4">
                                    <button type="submit" id="submit" class="btn btn-info pull-right"><i
                                            class="fa fa-search"></i> Search</button>
                                </div>
                            </div>

                        </div>
                        <!--  <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                            <button type="submit" id="submit" class="btn btn-info pull-right">Create</button>
                        </div> -->
                    </form>


                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!--/.col (right) -->

            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Report Details</h3>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Buyer</th>
                                    <th>Receipt ID</th>
                                    <th>Items</th>
                                    <th>Buyer Email</th>
                                    <th>Buyer IP</th>
                                    <th>Note</th>
                                    <th>City</th>
                                    <th>Phone</th>
                                    <th>Entry At</th>
                                    <th>Entry By</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    
                                    
                                if(!empty($result)){
                                     while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                <tr>
                                    <td><?php echo $row['buyer']; ?></td>
                                    <td><?php echo $row['receipt_id']; ?></td>
                                    <td><?php echo $row['items']; ?></td>
                                    <td><?php echo $row['buyer_email']; ?></td>
                                    <td><?php echo $row['buyer_ip']; ?></td>
                                    <td><?php echo $row['note']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['entry_at']; ?></td>
                                    <td><?php echo $row['entry_by']; ?></td>
                                </tr>
                                <?php 

                                     }
                                }else{
                                ?>
                                <tr>
                                    <td colspan="10">No Data Found</td>
                                </tr>
                                <?php 
                                }  
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script>
$("#reportNav").addClass('active');
</script>
<?php  include "inc/footer.php"; ?>
