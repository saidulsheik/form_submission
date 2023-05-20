<?php  require "inc/header.php"; ?>
<?php  require "inc/sidebar.php"; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Receipt
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Receipt</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

        </div>

        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Receipt</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" id="transaction_form" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="amount" class="col-sm-2 control-label">Amount</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" maxlength="10" name="amount" id="amount"
                                        placeholder="Type Only Number">
                                    <small class="form-text text-danger" id="amount-error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="buyer" class="col-sm-2 control-label">Buyer</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="buyer" id="buyer-input"
                                        placeholder="Only text, spaces, and numbers allowed (max 20 characters).">
                                    <small class="form-text text-danger" id="buyer-error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="receipt_id" class="col-sm-2 control-label">Receipt ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="receipt_id" id="receipt_id"
                                        placeholder="Only Text">
                                    <small class="form-text text-danger" id="receipt-id-error"></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="items" class="col-sm-2 control-label">Items</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="items" id="items"
                                        data-role="tagsinput" placeholder="Only Text">
                                    <small>For Multiple Item Type Item Name and press comma or enter.</small>
                                    <small class="form-text text-danger" id="items-error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="buyer_email" class="col-sm-2 control-label">Buyer Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="buyer_email" id="buyer_email"
                                        placeholder="Enter Valid Email Address">
                                    <small class="form-text text-danger" id="buyer-email-error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note" class="col-sm-2 control-label">Note</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="note" id="note" rows="3" maxlength="30"
                                        placeholder="Anything, not more than 30 words, and can be input unicode characters too"></textarea>
                                    <small class="form-text text-danger" id="note-error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="city" class="col-sm-2 control-label">City</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="city" id="city"
                                        placeholder="Only text and spaces">
                                    <small class="form-text text-danger" id="city-error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Only Number">
                                    <small class="form-text text-danger" id="phone-error"></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="entry_by" class="col-sm-2 control-label">Entry By</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="entry_by" id="entry_by"
                                        placeholder="Only Number">
                                    <small class="form-text text-danger" id="entry-by-error"></small>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" id="submit" class="btn btn-info pull-right">Create</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!--/.col (right) -->




        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
$(document).ready(function() {
    //amount field validation
    $("#amount").keypress(function(e) {
        //alert();
        let myArray = [];
        for (i = 48; i < 58; i++) myArray.push(i);
        if (!(myArray.indexOf(e.which) >= 0)) e.preventDefault();
    });

    //buyer

    $('#buyer-input').on('keyup', function() {
        var input = $(this).val();
        var regex = /^[A-Za-z0-9\s]{0,20}$/;
        var errorSpan = $('#buyer-error');

        if (!regex.test(input)) {
            input = input.substring(0, 20);
            $(this).val(input);
            errorSpan.text('Only text, spaces, and numbers allowed (max 20 characters).');
        } else {
            errorSpan.text('');
        }
    });

    //receipt_id
    $('#receipt_id').on('input', function() {
        this.value = this.value.replace(/[^a-zA-Z@]/g,
            ''); //<-- replace all other than given set of values
    });
    //item
    $('#items').on('input', function() {
        this.value = this.value.replace(/[^a-zA-Z@]/g,
            ''); //<-- replace all other than given set of values
    });

    $('#city').on('input', function() {
        this.value = this.value.replace(/[^a-zA-Z0-9@]/g,
            ''); //<-- replace all other than given set of values
    });

    //note
    $('#note').on('input', function() {
        var input = $(this).val();
        var words = input.trim().split(/\s+/);
        var errorSpan = $('#note-error');

        if (words.length > 30) {
            words = words.slice(0, 30);
            input = words.join(' ');
            $(this).val(input);
            errorSpan.text('Only up to 30 words allowed.');
        } else {
            errorSpan.text('');
        }
    });

    //phone 

    $('input[name="phone"]').on('keypress', function(e) {

        var phoneNumber = $(this).val();
        //alert(phoneNumber);
        if (phoneNumber.length >= 3 && phoneNumber.substring(0, 3) !== "880") {
            if (phoneNumber.charAt(0) === '0') {
                phoneNumber = phoneNumber.substring(1);
            }
            phoneNumber = $(this).val("880" + phoneNumber);

        }

        let myArray = [];
        for (i = 48; i < 58; i++) myArray.push(i);
        if (!(myArray.indexOf(e.which) >= 0)) e.preventDefault();

    });

    //

    $("#entry_by").keypress(function(e) {
        let myArray = [];
        for (i = 48; i < 58; i++) myArray.push(i);
        if (!(myArray.indexOf(e.which) >= 0)) e.preventDefault();
    });

});

$("#transaction_form").unbind('submit').on('submit', function(e) {
    e.preventDefault();
    //amount
    if ($('#amount').val() == '') {
        alert('Amount Can\'t be blank');
        $('#amount').focus();
        return false;
    }

    if ($('#buyer-input').val() == '') {
        alert('Buyer Can\'t be blank');
        return false;
    }

    if ($('#receipt_id').val() == '') {
        alert('Receipt Id Can\'t be blank');
        return false;
    }

    if ($('#items').val() == '') {
        alert('Item Can\'t be blank');
        return false;
    }
    //alert(IsEmail($('#buyer_email').val())); 
    //console.log(IsEmail($('#buyer_email').val()));
    if (IsEmail($('#buyer_email').val()) == false) {
        alert('Enter a Valid Email');
        return false;
    }

    if ($('#note').val() == '') {
        alert('Note Can\'t be blank');
        return false;
    }

    if ($('#city').val() == '') {
        alert('City Can\'t be blank');
        return false;
    }

    if ($('#phone').val() == '') {
        alert('Phone Can\'t be blank');
        return false;
    }

    if ($('#phone').val().length !== 13) {
        alert('Invalid Phone Number');
        return false;
    }


    if ($('#entry_by').val() == '') {
        alert('Entry By Can\'t be blank');
        return false;
    }

    var formData = $("#transaction_form").serialize(); // Serialize form data  
    $.ajax({
        type: 'POST',
        url: "<?php echo URL; ?>submit_receipt.php",
        data: formData,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            $('#transaction_form')[0].reset();
            $('#items').tagsinput('removeAll');

            if (response.success == true) {
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {

        }
    });


});

$("#add_receipt").addClass('active');
</script>

<?php  include "inc/footer.php"; ?>
