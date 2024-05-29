<script type="text/javascript">

const admin_closed =()=>{
     $('#spinner').css('display','block');
     var empid = document.getElementById('emp_id_admin').value;
     var fname = document.getElementById('fname_admin').value;
     var lname = document.getElementById('line_no_admin').value;
     var dateFrom = document.getElementById('recievedfrom_closed_admin').value;
     var dateTo = document.getElementById('recievedto_closed_admin').value;
     var carmaker = document.getElementById('carmaker_admin').value;
     var carmodel = document.getElementById('car_model_admin').value;  
     var audit_type = document.getElementById('audit_type_admin').value;
     var position = document.getElementById('position_admin').value;
     var audit_categ = document.getElementById('audit_categ_admin').value;
     var group = document.getElementById('group_admin').value;
     var shift = document.getElementById('shift_admin').value;
     var section = document.getElementById('section_admin').value;
     var falp_group = document.getElementById('falp_group').value;
     var provider = document.getElementById('provider_closed').value;

     $.ajax({
     url: '../../process/admin/list_of_audit_closed_processor.php',
     type: 'POST',
     cache: false,
     data:{ 
        method: 'fetch_closed_admin',
        empid:empid,
		fname:fname,
		lname:lname,
		dateFrom:dateFrom,
		dateTo:dateTo,
		carmaker:carmaker,
		carmodel:carmodel,
		audit_type:audit_type,
		position:position,
		audit_categ:audit_categ,
		group:group,
		shift:shift,
		section:section,
		falp_group:falp_group,
        provider:provider
   	 },success:function(response){
        document.getElementById('audited_closed_admin').innerHTML = response;
        $('#spinner').fadeOut(function(){
      });
	 }
      });
}	

function export_admin_audited_closed(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'List_of_Audited_Closed'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
	
	
</script>