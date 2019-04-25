<?php if (isset($message)) {

    echo '<div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <ul style="list-style-type:disc">' . $message . '</ul>
        </div>';
}?>
<section id="payment-section">
    <form class="payment-form" action="<?= $action; ?>" method="post" enctype="multipart/form-data" id="option">
        <h3>PLAN ONLINE PAYMENT</h3>
        <div class="container">

            <br>
            <h4>Plan Selected: <span>
                    <?= $plan; ?></span></h4>
            <a href="<?php echo site_url('subscription'); ?>"><small style='color: #e78320;'>Check All Plans</small></a>
            <br><br>


            <div class='row'>
                <div class="form-group col-md-6 col-sm-6">
                    <label for="">Select Payment Duration</label><br>
                    <label>
                        <input type="radio" name="payment-type" value="month" id="month">
                        <small class="rad">Monthly</small>
                    </label>
                    <label>
                        <input type="radio" name="payment-type" value="quarter" id="quarter">
                        <small class="rad">Quarterly</small>
                    </label>
                    <label>
                        <input type="radio" name="payment-type" value="year" id="year">
                        <small class="rad">Annually</small>
                    </label>

                </div>

                <div class="form-group col-md-4 col-sm-4">
                    <div class="input-icon">
                        <label for="amount">Amount(NGN)</label>
                        <div id='d_amount'>
                            <input id='amount_dis' type="text" class="form-control" name="amount_dis" placeholder="Amount" disabled="">
                        </div>


                    </div>
                </div>
                <input type="hidden" value="<?= $plan_id; ?>" id="plan_id">

            </div>
        </div>



        <button class="btn">Pay Now</button>

    </form>

</section>

<script type="text/javascript">
    $(document).ready(function() {
        var plan_id = $('#plan_id').val();
        $('input[type=radio][name=payment-type]').change(function() {
            if (this.value == 'month') {
                var option = 'per_month';


            } else if (this.value == 'quarter') {
                var option = 'per_quarter';

            } else if (this.value == 'year') {
                var option = 'per_year';

            }

            $.ajax({
                url: "<?= base_url('subscription/get_amount'); ?>",
                type: "POST",
                data: {
                    'plan_id': plan_id,
                    'option': option
                },
                success: function(data) {
                    $('#d_amount').html(data);
                },
                error: function() {
                    alert('Error Occur....!!');
                }
            });



        });

    });
</script> 