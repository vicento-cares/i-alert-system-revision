<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>
<section class="content">
  <div class="container-fluid">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>

            <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <?php
                $sections_count_list = []; // Initialize the data array
                $combinedData = []; // Initialize the combined data array
                
                $section = "";
                $falp_group = "";
                $total = 0;
                $grand_total = 0;

                $falp_groups1 = [
                  'FAP1',
                  'FAP2',
                  'FAP3',
                  'FAP4'
                ];

                $falp_groups2 = [
                  'First Process',
                  'Secondary 1 Process',
                  'Secondary 2 Process'
                ];

                $sections = [
                  'Section 1',
                  'Section 2',
                  'Section 3',
                  'Section 4',
                  'Section 5',
                  'Section 6',
                  'Section 7',
                  'Section 9',
                  'Repair Process',
                  'Tsumesen Insertion',
                  'First Process',
                  'Secondary 1 Process',
                  'Secondary 2 Process',
                  'QC',
                  'QAE',
                  'CQA'
                ];

                // Create placeholders for each row
                $generated_placeholders = implode(',', array_fill(0, count($sections), '?'));
                $placeholders = "($generated_placeholders)";

                $query = "SELECT DISTINCT section, falp_group 
                          FROM ialert_section 
                          WHERE section IN $placeholders 
                          OR falp_group = 'Other Group'
                          ORDER BY falp_group ASC, section ASC";
                $stmt = $conn->prepare($query);
                $stmt->execute($sections);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $section = $row['section'];
                  $section_params = addslashes($section);
                  $falp_group = $row['falp_group'];
                  $query1 = "";
                  $total = 0; // Reset total for each section
                  $grand_total = 0; // Reset grand_total for each section
                
                  if (in_array($falp_group, $falp_groups1)) {
                    // FAP Sections
                    $query1 = "SELECT COUNT(total) AS total 
                                FROM (
                                    SELECT id AS total FROM ialert_audit 
                                    WHERE pd = 'Written IR' AND line_no != 'initial' AND section = '$section_params' 
                                    AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL
                                    UNION ALL
                                    SELECT id AS total FROM ialert_audit 
                                    WHERE edit_count != 0 AND line_no != 'initial' AND section = '$section_params' 
                                    AND provider = 'fas' AND date_recieved IS NULL
                                ) AS J";
                    $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit 
                                WHERE line_no != 'initial' AND section = '$section_params' AND provider = 'fas'";
                  } else if (in_array($falp_group, $falp_groups2)) {
                    // FSP
                    $query1 = "SELECT COUNT(total) AS total 
                                FROM (
                                    SELECT id AS total FROM ialert_audit 
                                    WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section_params' 
                                    AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL
                                    UNION ALL
                                    SELECT id AS total FROM ialert_audit 
                                    WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section_params' 
                                    AND provider = 'fas' AND date_recieved IS NULL
                                ) AS J";
                    $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit 
                                WHERE line_no = 'initial' AND section = '$section_params' AND provider = 'fas'";
                  } else {
                    // GC, QA, Other Groups
                    $query1 = "SELECT COUNT(*) AS total FROM ialert_audit 
                                WHERE edit_count !=0 AND section = '$section_params' 
                                AND provider = 'fas' AND date_recieved IS NULL";
                                $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit 
                                WHERE section = '$section_params' AND provider = 'fas'";
                    $section = $falp_group;
                  }

                  $stmt1 = $conn->prepare($query1);
                  $stmt1->execute();

                  while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    $total += intval($row1['total']);
                  }

                  $stmt1 = $conn->prepare($query2);
                  $stmt1->execute();

                  while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    $grand_total += intval($row1['grand_total']);
                  }

                  // Combine results
                  if (!isset($combinedData[$section])) {
                    $combinedData[$section] = ['total' => 0, 'grand_total' => 0];
                  }
                  $combinedData[$section]['total'] += $total;
                  $combinedData[$section]['grand_total'] += $grand_total;
                }

                // Convert combined data to the desired output format
                foreach ($combinedData as $section => $totals) {
                  array_push($sections_count_list, array('section' => $section, 'total' => $totals['total'], 'grand_total' => $totals['grand_total']));
                }


                // Provider
                $total = 0; // Reset total for each section
                $grand_total = 0; // Reset grand_total for each section

                $query = "SELECT DISTINCT provider FROM ialert_audit WHERE provider != 'fas'";
                $stmt = $conn->prepare($query);
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  $provider = $row['provider'];
                  $provider_params = addslashes($provider);
                
                  $query1 = "SELECT COUNT(*) AS total FROM ialert_audit WHERE edit_count !=0 AND provider = '$provider_params' AND date_recieved IS NULL";
                  $stmt1 = $conn->prepare($query1);
                  $stmt1->execute();

                  while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    $total += intval($row1['total']);
                  }

                  $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit WHERE provider = '$provider_params'";
                  $stmt1 = $conn->prepare($query2);
                  $stmt1->execute();

                  while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                    $grand_total += intval($row1['grand_total']);
                  }

                  array_push($sections_count_list, array('section' => $provider, 'total' => $total, 'grand_total' => $grand_total));
                }

                foreach ($sections_count_list as &$section_count) {
                  echo '
                        <div class="col-lg-3">    
                          <div class="info-box">
                              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                                  <div class="info-box-content">
                                      <span class="info-box-text"><b>' . $section_count['section'] . '</b></span>
                                      <span class="info-box-number">
                                          <label style="color:red;">Pending: <label id="count_sec1">' . $section_count['total'] . '</label></label> / 
                                          <label for="">Total: <label id="grand_total">' . $section_count['grand_total'] . '</label></label>
                                      </span>
                                  </div>
                            </div>
                      </div>';
                }
                ?>
              </div>


            </div>

          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
  </div>
</section>

<?php include 'plugins/footer.php'; ?>