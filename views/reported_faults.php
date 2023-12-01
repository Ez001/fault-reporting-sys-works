<main id="main" class="main">

   <div class="pagetitle">
      <h1 class="">Report Fault</h1>
      <div class="d-md-flex justify-content-between">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
               <li class="breadcrumb-item">Report Fault</li>
            </ol>
         </nav>
      </div>
   </div><!-- End Page Title -->

   <section class="section">
      
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="text-end mb-2 mt-2">
                  </div>
                  <?php
                     echo $web_app->showAlert( $msg, true );
                     if ( $r_fault_arr ) 
                     {
                  ?>
                  <div class="mt-2">
                     <?php
                        echo "<table class='table table-responsive table-striped' id='my_datatable' style='width: 100%'>
                        <thead>
                           <tr>
                              <th>S/N</th>
                              <th>Reported By</th>
                              <th>Fault</th>
                              <th>Description</th>
                              <th>Engineer</th>
                              <th>Status</th>
                              <th>Feed Back</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S/N</th>
                              <th>Reported By</th>
                              <th>Fault</th>
                              <th>Description</th>
                              <th>Engineer</th>
                              <th>Status</th>
                              <th>Feed Back</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>";

                        $sn = 0;
                        $tr_content = '';

                        //looping through records
                        foreach ( $r_fault_arr as $r_fault_data ) 
                        {
                           $id = $r_fault_data[ 'id' ];
                           $full_name = $web_app->fullName( $r_fault_data );
                           $fault_id = $r_fault_data[ 'fault_id' ];
                           $fault = $faults->getById( [ $fault_id ] );
                           $description = $r_fault_data[ 'description' ];
                           $engineer_id = $r_fault_data[ 'engineer_id' ];
                           $engineer_dt = $engr->getById( [ $engineer_id ] );
                           $engineer = $web_app->fullName( $engineer_dt );
                           $status = $r_fault_data[ 'status' ];
                           $feed_back = $r_fault_data[ 'feed_back' ];
                           $btn_state = $status == 'Completed' ? 'd-none' : '';
                           $status_x = $web_app->showStatusType( $status );

                           $sn++;
                           
                           $tr_content .=  "<tr>
                              <td class='fw-light'> $sn </td>
                              <td class='fw-light'> $full_name </td>
                              <td class='fw-light'> $fault </td>
                              <td class='fw-light'> $description </td>                              
                              <td class='fw-light'> $engineer </td>                              
                              <td class='fw-light'> $status_x </td>
                              <td class='fw-light'> $feed_back </td>
                              <td class='fw-light'>
                                 <button type='button' class='btn btn-success $btn_state edit_reported_fault mb-2' id='edit_reported_fault_btn$id' data-bs-toggle='modal' data-bs-target='#editReportedFaultModal' data-id='$id' data-status='$status' data-engineer_id='$engineer_id' data-feed_back='$feed_back' title='Edit'><label for='edit_reported_fault_btn$id' class=''><i class='bi bi-pencil'></i> <span class='d-none d-md-inline'>Update</span></label>
                                 </button>
                              
                              </td>
                           </tr>";
                        }

                        echo $tr_content .= '</tbody></table>';
                  
                     ?>
                  </div>
                  <?php
                     }
                  ?>
               </div>
            </div>
         </div>
      </div>
      
   </section>  
</main><!-- End #main -->

<!-- Start Edit reported_fault Modal-->
<div class="modal fade" id="editReportedFaultModal" tabindex="-1">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title"><strong>Edit Reported Fault</strong></h3>
            <button type="button" class="btn-close h2" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="" method="POST">
               <input type="hidden" name="refaulted_fault_id" id="refaulted_fault_id">
               <div class="card p-3">
                  <h5>Please, fill in the details below!</h5>
                  <div class="row">  
                     <div class="form-group col-md-6  mt-3">
                        <label class="fw-bold" for="edit_engineer_id">Engineer <span class="text-danger">*</span></label>
                        <div>
                           <select name="edit_engineer_id" id="edit_engineer_id" class="form-select">
                              <option>Select Engineer</option>
                              <?= $engr->loadEngineers( $engr_arr ) ?>
                           </select>
                        </div>
                     </div>

                     <div class="form-group col-md-6  mt-3">
                        <label class="fw-bold" for="edit_status">Status <span class="text-danger">*</span></label>
                        <div>
                           <select name="edit_status" id="edit_status" class="form-select">
                              <option>Select Status</option>
                              <?= $web_app->loadStatuses() ?>
                           </select>
                        </div>
                     </div>

                     <div class="mt-3">
                        <label for="edit_feed_back" class="fw-bold">Feed Back <span class="text-danger">*</span></label>
                        <div>
                           <textarea name="edit_feed_back" id="edit_feed_back" class="form-control" placeholder="Enter Feed Back" maxlength="1000" required></textarea>
                        </div>
                     </div>

                     <div class="text-center mt-3">
                        <button type="submit" name="edit_btn" id="edit_btn" class="btn btn-success" >Save</button>
                     </div>

                   </div>
                </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- End Edit Dog Modal-->