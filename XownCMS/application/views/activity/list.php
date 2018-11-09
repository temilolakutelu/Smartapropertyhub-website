<link type="text/css" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url(); ?>assets/datatables/dataTables.themify.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url(); ?>assets/css/list.css" rel="stylesheet">

<?php
if ($this->session->userdata('error') <> '') {
  echo '<div class="alert alert-dismissable alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<i class="ti ti-alert"></i>&nbsp; <strong>Error!</strong> There are some errors happening
										<p>' . $this->session->userdata("error") . '</p>
								</div>';
}
?>
        <?php
        if ($this->session->userdata('message') <> '') {
          echo '<div class="alert alert-dismissable alert-info">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong><p><i class="ti ti-check"></i>&nbsp; ' . $this->session->userdata("message") . '</p></strong>
								</div>';
        }
        ?>

<div data-widget-group="group1">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default list-panel">
				<div class="panel-heading">
					<h2>All Site Activities </h2>
					<div class="panel-ctrls">
            
           
          </div>
				</div>
        <div class="panel-body no-padding">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th class="hidden"></th>
								<th>Visitor's name</th>
								<th>Company Name</th>
                <th>Activity</th>
                <th>Agent ID</th>
                <th>Timestamp</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              <?php

              foreach ($activity_data as $sub) { ?>
                
                    <tr class="odd gradeX">
                    <td class="hidden"></td>
                                        <td><?= $sub->fullname ?></td>
                                        <td><?= $sub->company_Name ?></td>
                                        <td><?= $sub->activity_Desc ?></td>
                                        <td><?= $sub->agent_ID ?></td>
                                        <td><?= $sub->activity_Time ?></td>
                                        <td><?= anchor(site_url('activity/delete/' . $sub->activity_ID), 'Delete', array('class' => 'btn btn-danger btn-sm')) ?>
                          </td>
                    </tr>
             <?php 
          } ?>
              </tbody>
            </table>
          </div>
          <div class="panel-footer"></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
