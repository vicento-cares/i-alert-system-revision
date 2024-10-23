  <footer class="main-footer">
    <strong>Copyright &copy; 2024. Developed by: JJ Buendia & Vince Dale Alcantara</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.0
    </div>
  </footer>
<?php
//MODALS
include '../../modals/logout.php';
if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/pending_count.php") {
  include '../../modals/admin/pending_count_modal.php';
  include '../../modals/admin/update_audit.php';
  include '../../modals/admin/count.php';
} else {
  include '../../modals/admin/accounts/add_user.php';
  include '../../modals/admin/accounts/update_user.php';
  include '../../modals/admin/sections/add_section.php';
  include '../../modals/admin/sections/update_section.php';
  include '../../modals/admin/add_audit.php';
  include '../../modals/admin/add_line_audit.php';
  include '../../modals/admin/update_audit.php';
  include '../../modals/admin/update_lineaudit.php';
  include '../../modals/admin/import_audit.php';
  include '../../modals/admin/import_line_audit.php';
}
?>
<!-- jQuery -->
<script src="../../plugins/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- sweetalert -->
<script type="text/javascript" src="../../plugins/sweetalert/dist/sweetalert.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/dist/chart.min.js"></script>

</body>
</html>