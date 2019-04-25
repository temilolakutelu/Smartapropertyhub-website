<section id='view'>

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

    <form method='post' action='<?= $action; ?>'>
        <h2>Inspection Request Form for:</h2>
        <h5><?= $property_data->property_Name; ?></h5>
        <div class="form-group">
            <label for="exampleInputEmail1">Full Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name='name'>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name='email' class="form-control" id="exampleInputEmail1" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Message</label>
            <textarea name="msg" id="" cols="30" rows="6" class='form-control'></textarea>
        </div>
        <input type="hidden" name="property" value='<?= $property_data->property_ID; ?>'>
        <input type="hidden" name="agent" value='<?= $property_data->user_ID; ?>'>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

</section> 