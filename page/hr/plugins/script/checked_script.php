<script type="text/javascript">
	
const load_list_of_audited_findings_hr_checked =()=>{
    $('#spinner').css('display','block');
     var empid = document.getElementById('empid_audited_fass_checked').value;
     var fname = document.getElementById('fname_audited_fass_checked').value;
     var lname = document.getElementById('linename_audited_fass_checked').value;
     var dateFrom = document.getElementById('hrauditedlistcheckeddatefrom').value;
     var dateTo = document.getElementById('hrauditedlistcheckeddateto').value;
     var esection = '<?=$esection;?>';
     var carmaker = document.getElementById('carmaker_checked').value;
     var carmodel = document.getElementById('carmodel_checked').value;
     var position = document.getElementById('position_checked').value;
     var audit_type = document.getElementById('audit_type_checked').value;

     $.ajax({
        url: '../../process/hr/checked_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'fetch_audited_list_hr_checked',
            dateFrom:dateFrom,
            dateTo:dateTo,
            empid:empid,
            fname:fname,
            esection:esection,
            lname:lname,
            carmaker:carmaker,
            carmodel:carmodel,
            position:position,
            audit_type:audit_type
                    
     },success:function(response){
       document.getElementById('audited_data_hr_checked').innerHTML = response;
       $('#spinner').fadeOut(function(){
                        
                    });
                }
            });   
}	

const uncheck_all =()=>{
    var select_all = document.getElementById('check_all_hr_checked');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func =()=>{
    var select_all = document.getElementById('check_all_hr_checked');
    if(select_all.checked == true){
        console.log('check');
        $('.singleCheck').each(function(){
            this.checked=true;
        });
    }else{
        console.log('uncheck');
        $('.singleCheck').each(function(){
            this.checked=false;
        }); 
    }
}

const update_status_hr_checked =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    var status = $('#status_hr_checked').val();

 if(status == ''){
         swal('ALERT','Select Status!','info'); 

   } else{

    $.ajax({
        url: '../../process/hr/checked_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'update_hr_checked',
            id:arr,
            status:status
      
            
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_list_of_audited_findings_hr_checked();
             uncheck_all();
                swal('SUCCESS!', 'Success', 'success');
                $('#status_hr_checked').val('');
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}
}

function export_audited_list_hr_checked(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Checked'+ '_' + new Date().toLocaleDateString() + '.csv';
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