<br><br>

<?php
if (validation_errors() != false) {
    echo '<div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-exclamation-triangle"></i>&nbsp; <strong>Error!</strong><ul style="list-style-type:disc">' . validation_errors() . '</ul>
            </div>';
}
?>
<?php if (isset($message)) {

    echo '<div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <ul style="list-style-type:disc">' . $message . '</ul>
        </div>';
} elseif (isset($error)) {

    echo '<div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-exclamation-triangle"></i></i>&nbsp; <strong>Error!</strong> There are some errors in your form
            <ul style="list-style-type:disc">' . $error . '</ul>
        </div>';
} ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Property Alert Form</div>
        <div class="panel-body">
            <form action="<?= base_url(); ?>user/property_alert_action" method="post">
                <br><br>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label>Choose a Category</label>
                        <select name="category" class="form-control">
                            <option value="0">Select Category</option>
                            <option value="1">For Rent</option>
                            <option value="3">Short Let</option>
                            <option value="2">To Let</option>
                        </select>

                    </div>

                    <div class="form-group col-sm-4">
                        <label>Choose No of Bedroom....</label>
                        <select name="beds_no" data-live-search="true" data-live-search-placeholder="Search value" class="form-control">
                            <option value="0">
                                Any no. of Bed</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                        </select>


                    </div>

                    <div class="form-group col-sm-4">
                        <label>Select Max Price....</label>
                        <select name="max-price" data-live-search="true" data-live-search-placeholder="Search value" class="form-control">
                            <option value="0" selected="selected">Max Price
                            </option>
                            <option value='10000'>10,000</option>
                            <option value='100000'>100,000</option>
                            <option value='1000000'>1,000,000</option>
                            <option value='10000000'>10,000,000</option>
                            <option value='500000000'>500,000,000</option>
                        </select>

                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="form-group col-sm-3">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" placeholder="Enter the Country">
                    </div>

                    <div class="form-group col-sm-3">

                        <label>State</label>
                        <input type="text" name="state" class="form-control" placeholder="Enter the State">

                    </div>

                    <div class="form-group col-sm-3">

                        <label>City</label>
                        <input type="text" name="city" class="form-control" placeholder="Enter the City">

                    </div>
                    <div class="form-group col-sm-3">
                        <label>Type</label>
                        <select name="subtype" id="type" class="form-control">
                            <option selected="selected" value="0">Select type...</option>
                            <?php foreach ($type_data as $type) : ?>
                            <option value="<?php echo $type->subtype_name; ?>">
                                <?php echo $type->subtype_name; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>


                <br>


                <div class="row">
                    <div class="form-group col-sm-4">
                        <label>Enter Your Full Name</label>
                        <input type="text" name="fullname" placeholder="Full Name" class="form-control">
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Enter Your Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control">
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Enter Your Phone Number</label>
                        <input type="text" name="mobile" placeholder="Phone Number" class="form-control">
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label>Further Information (optional)</label>
                        <textarea row="3" class="form-control" name="additional_info"></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" value="Submit" class="btn btn-info">
                </div>
            </form>

        </div>

    </div>

</div>


</div> 