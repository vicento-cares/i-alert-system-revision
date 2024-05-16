<script type="text/javascript">

$(document).ready(function(){
    fetch_other_group_dropdown();
    fetch_section_dropdown("First Process");
    fetch_section_dropdown("Secondary 1 Process");
    fetch_section_dropdown("Secondary 2 Process");
    fetch_section_dropdown("QA");
});

// Revisions (Vince)
const fetch_other_group_dropdown = () => {
    $.ajax({
        url: '../../process/admin/sections.php',
        type: 'POST',
        cache: false,
        data: {
            method: 'fetch_other_group_dropdown'
        },
        success: function (response) {
            $('#other_pending').html(response);
        }
    });
}

// Revisions (Vince)
const fetch_section_dropdown = falp_group => {
    $.ajax({
        url: '../../process/admin/sections.php',
        type: 'POST',
        cache: false,
        data: {
            method: 'fetch_section_dropdown',
            falp_group: falp_group
        },
        success: function (response) {
            switch (falp_group) {
                case "First Process":
                    $('#section_fp').html(response);
                    break;
                case "Secondary 1 Process":
                    $('#section_sp1').html(response);
                    break;
                case "Secondary 2 Process":
                    $('#section_sp2').html(response);
                    break;
                case "QA":
                    $('#section_qa').html(response);
                    break;
                default:
                    break;
            }
        }
    });
}

const load_count =()=>{
	sec1();
	sec2();
    sec3();
    sec4();
    sec5();
    sec6();
    sec7();
    sec8();
    sec9();
    fp();
    sp1();
    sp2();
    qa();
    other_group();
    providers();
}
const count =()=>{
      var employee_num_count = document.querySelector('#employee_num_count').value;
      var full_name_count = document.getElementById('full_name_count').value;
    $.ajax({
        url:'../../process/admin/count_processor.php',
        type:'POST',
        cache:false,
        data:{
            method:'audit_count',
            employee_num_count:employee_num_count,
            full_name_count:full_name_count
        },success:function(response){
            $('#count_data').html(response);
        }
    });
} 

const get_set =(param)=>{
    var data = param.split('~!~');
    var id = data[0];
    var employee_num = data[1];
    var full_name = data[2];
    var position = data[3];
    var provider = data[4];
    var shift = data[5];
    var group = data[6];
    var audit_type = data[7];
    var audited_categ = data[8];
    var car_maker = data[9];
    var car_model = data[10];
    var line_no = data[11];
    var process = data[12];
    var audit_findings = data[13];
    var audited_by = data[14];
    var date_audited = data[15];
    var remarks = data[16];
   
    document.getElementById('id_update').value = id;
    document.getElementById('employee_num_update').value = employee_num;
    document.getElementById('full_name_update').value = full_name;
    document.getElementById('position_update').value = position;
    document.getElementById('provider_update').value = provider;
    document.getElementById('shift_update').value = shift;
    document.getElementById('group_update').value = group;
    document.getElementById('audit_type_update').value = audit_type;
    document.getElementById('audit_categ_update').value = audited_categ;
    document.getElementById('carmaker_update').value = car_maker;
    document.getElementById('carmodel_update').value = car_model;
    document.getElementById('emline_update').value = line_no;
    document.getElementById('process_update').value = process;
    document.getElementById('audit_findings_update').value = audit_findings;
    document.getElementById('audited_by_update').value = audited_by;
    document.getElementById('date_audited_update').value = date_audited;
    document.getElementById('remarks_update').value = remarks;

}

const update_audit_data =()=>{
  
   var id = document.getElementById('id_update').value;
   var employee_num = document.getElementById('employee_num_update').value;
   var full_name = document.getElementById('full_name_update').value;
   var position = document.getElementById('position_update').value;
   var provider = document.getElementById('provider_update').value;
   var shift = document.getElementById('shift_update').value;
   var groups = document.getElementById('group_update').value;
   var audit_type = document.getElementById('audit_type_update').value;
   var audit_categ = document.getElementById('audit_categ_update').value;
   var carmaker = document.getElementById('carmaker_update').value;
   var carmodel = document.getElementById('carmodel_update').value;
   var emline = document.getElementById('emline_update').value;
   var process = document.getElementById('process_update').value;
   var audit_findings = document.getElementById('audit_findings_update').value;
   var audited_by = document.getElementById('audited_by_update').value;
   var date_audited = document.getElementById('date_audited_update').value;
   var remarks = document.getElementById('remarks_update').value;
   
    $.ajax({
        url: '../../process/admin/update_audit_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'updateaudit',
            id:id,
            employee_num:employee_num,
            full_name:full_name,
            position:position,
            provider:provider,
            shift:shift,
            groups:groups,
            audit_type:audit_type,
            audit_categ:audit_categ,
            carmaker:carmaker,
            carmodel:carmodel,
            emline:emline,
            process:process,
            audit_findings:audit_findings,
            audited_by:audited_by,
            date_audited:date_audited,
            remarks:remarks
            
        },success:function(response) {
            if (response == 'success') {
             load_sec1();
             load_sec2();
             load_sec3();
             load_sec4();
             load_sec5();
             load_sec6();
             load_sec7();
             load_sec8();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
}	
const load_sec1  =()=>{
         var dateFrom = document.getElementById('auditedsec1datefrom').value;
         var dateTo = document.getElementById('auditedsec1dateto').value;
         var empid = document.getElementById('empid_sec1').value;
         var fname = document.getElementById('fname_sec1').value;
         var line = document.getElementById('linen_sec1').value;
         var carmaker = document.getElementById('carmaker_sec1').value;
         var carmodel = document.getElementById('carmodel_sec1').value;
         var position = document.getElementById('position_sec1').value;
         var audit_type = document.getElementById('audit_type_sec1').value;
 
           $.ajax({
                url: '../../process/admin/sec1_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec1',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    document.getElementById('preview_sec1_data').innerHTML = response;  
               
                }
            });
          
} 

const sec1 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
        $.ajax({
           url: '../../process/admin/sec1_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section1',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type                    
                },success:function(response){ 
                    document.getElementById('count_sec1').innerHTML = response; 
                    sec1total();
                }   
    });

} 

const sec1total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec1_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec1',
                    dateFrom:dateFrom,
                    dateTo:dateTo    
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total').innerHTML = response; 
               
                }   
    });
}

const uncheck_all_sec1 =()=>{
    var select_all = document.getElementById('check_all_audit_sec1');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec1 =()=>{
    var select_all = document.getElementById('check_all_audit_sec1');
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

function export_sec1_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section1'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec1 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){


    $.ajax({
        url: '../../process/admin/sec1_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec1',
            id:arr    
            
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_sec1();
             uncheck_all_sec1();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}
const load_sec2  =()=>{
         var dateFrom = document.getElementById('auditedsec2datefrom').value;
         var dateTo = document.getElementById('auditedsec2dateto').value;
         var empid = document.getElementById('empid_sec2').value;
         var fname = document.getElementById('fname_sec2').value;
         var line = document.getElementById('linen_sec2').value;
         var carmaker = document.getElementById('carmaker_sec2').value;
         var carmodel = document.getElementById('carmodel_sec2').value;
         var position = document.getElementById('position_sec2').value;
         var audit_type = document.getElementById('audit_type_sec2').value;

           $.ajax({
                url: '../../process/admin/sec2_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec2',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    document.getElementById('preview_sec2_data').innerHTML = response;  
               
                }
            });          
}

const sec2 =()=>{
     var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;

    $.ajax({
           url: '../../process/admin/sec2_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section2',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('count_sec2').innerHTML = response;   
                sec2total();
                }   
    });

}
 
const sec2total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec2_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec2',
                     dateFrom:dateFrom,
                    dateTo:dateTo
                    
                },success:function(response){
                    document.getElementById('grand_total2').innerHTML = response; 
               
                }   
    });
}

const uncheck_all_sec2 =()=>{
    var select_all = document.getElementById('check_all_audit_sec2');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec2 =()=>{
    var select_all = document.getElementById('check_all_audit_sec2');
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

function export_sec2_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section2'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec2 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){


    $.ajax({
        url: '../../process/admin/sec2_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec2',
            id:arr
      
            
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_sec2();
             uncheck_all_sec2();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const load_sec3  =()=>{
         var dateFrom = document.getElementById('auditedsec3datefrom').value;
         var dateTo = document.getElementById('auditedsec3dateto').value;
         var empid = document.getElementById('empid_sec3').value;
         var fname = document.getElementById('fname_sec3').value;
         var line = document.getElementById('linen_sec3').value;
         var carmaker = document.getElementById('carmaker_sec3').value;
         var carmodel = document.getElementById('carmodel_sec3').value;
         var position = document.getElementById('position_sec3').value;
         var audit_type = document.getElementById('audit_type_sec3').value;

           $.ajax({
                url: '../../process/admin/sec3_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec3',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    document.getElementById('preview_sec3_data').innerHTML = response;  
               
                }
            });          
}

const sec3 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
           url: '../../process/admin/sec3_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section3',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('count_sec3').innerHTML = response;   
                sec3total();
                }   
    });

}

const sec3total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec3_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec3',
                     dateFrom:dateFrom,
                    dateTo:dateTo
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total3').innerHTML = response; 
               
                }   
    });
}

// check all and uncheck
const uncheck_all_sec3 =()=>{
    var select_all = document.getElementById('check_all_audit_sec3');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec3 =()=>{
    var select_all = document.getElementById('check_all_audit_sec3');
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

function export_sec3_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section3'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec3 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){


    $.ajax({
        url: '../../process/admin/sec3_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec3',
            id:arr
            
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_sec3();
             uncheck_all_sec3();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const load_sec4  =()=>{
         var dateFrom = document.getElementById('auditedsec4datefrom').value;
         var dateTo = document.getElementById('auditedsec4dateto').value;
         var empid = document.getElementById('empid_sec4').value;
         var fname = document.getElementById('fname_sec4').value;
         var line = document.getElementById('linen_sec4').value;
         var carmaker = document.getElementById('carmaker_sec4').value;
         var carmodel = document.getElementById('carmodel_sec4').value;
         var position = document.getElementById('position_sec4').value;
         var audit_type = document.getElementById('audit_type_sec4').value;

           $.ajax({
                url: '../../process/admin/sec4_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec4',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('preview_sec4_data').innerHTML = response;  
               
                }
            });          
}

const sec4 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
           url: '../../process/admin/sec4_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section4',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('count_sec4').innerHTML = response;   
               sec4total();
                }   
    });

}

const sec4total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec4_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec4',
                    dateFrom:dateFrom,
                    dateTo:dateTo
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total4').innerHTML = response; 
               
                }   
    });
}

// check all and uncheck
const uncheck_all_sec4 =()=>{
    var select_all = document.getElementById('check_all_audit_sec4');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec4 =()=>{
    var select_all = document.getElementById('check_all_audit_sec4');
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

function export_sec4_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section4'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec4 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){


    $.ajax({
        url: '../../process/admin/sec4_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec4',
            id:arr
      
            
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_sec4();
             uncheck_all_sec4();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const load_sec5  =()=>{
         var dateFrom = document.getElementById('auditedsec5datefrom').value;
         var dateTo = document.getElementById('auditedsec5dateto').value;
         var empid = document.getElementById('empid_sec5').value;
         var fname = document.getElementById('fname_sec5').value;
         var line = document.getElementById('linen_sec5').value;
         var carmaker = document.getElementById('carmaker_sec5').value;
         var carmodel = document.getElementById('carmodel_sec5').value;
         var position = document.getElementById('position_sec5').value;
         var audit_type = document.getElementById('audit_type_sec5').value;

           $.ajax({
                url: '../../process/admin/sec5_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec5',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('preview_sec5_data').innerHTML = response;            
                }
            });          
}

const sec5 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
           url: '../../process/admin/sec5_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section5',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type
                },success:function(response){
                    // console.log(response);
                    document.getElementById('count_sec5').innerHTML = response;   
                sec5total();
                }   
    });

}

const sec5total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec5_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec5',
                     dateFrom:dateFrom,
                    dateTo:dateTo
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total5').innerHTML = response; 
               
                }   
    });
}

// check all and uncheck
const uncheck_all_sec5 =()=>{
    var select_all = document.getElementById('check_all_audit_sec5');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec5 =()=>{
    var select_all = document.getElementById('check_all_audit_sec5');
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

function export_sec5_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section5'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec5 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){


    $.ajax({
        url: '../../process/admin/sec5_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec5',
            id:arr          
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_sec5();
             uncheck_all_sec5();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const load_sec6  =()=>{
         var dateFrom = document.getElementById('auditedsec6datefrom').value;
         var dateTo = document.getElementById('auditedsec6dateto').value;
         var empid = document.getElementById('empid_sec6').value;
         var fname = document.getElementById('fname_sec6').value;
         var line = document.getElementById('linen_sec6').value;
         var carmaker = document.getElementById('carmaker_sec6').value;
         var carmodel = document.getElementById('carmodel_sec6').value;
         var position = document.getElementById('position_sec6').value;
         var audit_type = document.getElementById('audit_type_sec6').value;

           $.ajax({
                url: '../../process/admin/sec6_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec6',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('preview_sec6_data').innerHTML = response;  
               
                }
            });          
}

const sec6 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
           url: '../../process/admin/sec6_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section6',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type
                },success:function(response){
                    // console.log(response);
                    document.getElementById('count_sec6').innerHTML = response;   
                sec6total();
                }   
    });

}

const sec6total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec6_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec6',
                     dateFrom:dateFrom,
                    dateTo:dateTo
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total6').innerHTML = response; 
               
                }   
    });
}

// check all and uncheck
const uncheck_all_sec6 =()=>{
    var select_all = document.getElementById('check_all_audit_sec6');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec6 =()=>{
    var select_all = document.getElementById('check_all_audit_sec6');
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

function export_sec6_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section6'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec6 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){


    $.ajax({
        url: '../../process/admin/sec6_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec6',
            id:arr
      
            
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_sec6();
             uncheck_all_sec6();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const load_sec7  =()=>{
         var dateFrom = document.getElementById('auditedsec7datefrom').value;
         var dateTo = document.getElementById('auditedsec7dateto').value;
         var empid = document.getElementById('empid_sec7').value;
         var fname = document.getElementById('fname_sec7').value;
         var line = document.getElementById('linen_sec7').value;
         var carmaker = document.getElementById('carmaker_sec7').value;
         var carmodel = document.getElementById('carmodel_sec7').value;
         var position = document.getElementById('position_sec7').value;
         var audit_type = document.getElementById('audit_type_sec7').value;

           $.ajax({
                url: '../../process/admin/sec7_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec7',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('preview_sec7_data').innerHTML = response;  
               
                }
            });          
}

const sec7 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
           url: '../../process/admin/sec7_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section7',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type
                    
                },success:function(response){
                    document.getElementById('count_sec7').innerHTML = response;   
                sec7total();
                }   
    });

}

const sec7total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec7_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec7',
                     dateFrom:dateFrom,
                    dateTo:dateTo
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total7').innerHTML = response; 
               
                }   
    });
}

// check all and uncheck
const uncheck_all_sec7 =()=>{
    var select_all = document.getElementById('check_all_audit_sec7');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec7 =()=>{
    var select_all = document.getElementById('check_all_audit_sec7');
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

function export_sec7_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section7'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec7 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){


    $.ajax({
        url: '../../process/admin/sec7_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec7',
            id:arr
      
            
        },success:function(response) {
            console.log(response);
            if (response == 'success') {
             load_sec7();
             uncheck_all_sec7();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const load_sec8  =()=>{
         var dateFrom = document.getElementById('auditedsec8datefrom').value;
         var dateTo = document.getElementById('auditedsec8dateto').value;
         var empid = document.getElementById('empid_sec8').value;
         var fname = document.getElementById('fname_sec8').value;
         var line = document.getElementById('linen_sec8').value;
         var carmaker = document.getElementById('carmaker_sec8').value;
         var carmodel = document.getElementById('carmodel_sec8').value;
         var position = document.getElementById('position_sec8').value;
         var audit_type = document.getElementById('audit_type_sec8').value;

           $.ajax({
                url: '../../process/admin/sec8_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_sec8',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type
                    
                },success:function(response){
                    document.getElementById('preview_sec8_data').innerHTML = response;               
                }
            });          
}

// check all and uncheck
const uncheck_all_sec8 =()=>{
    var select_all = document.getElementById('check_all_audit_sec8');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec8 =()=>{
    var select_all = document.getElementById('check_all_audit_sec8');
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

function export_sec8_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section8'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec8 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/sec8_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec8',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_sec8();
             uncheck_all_sec8();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const sec8 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
           url: '../../process/admin/sec8_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_section8',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type
                    
                },success:function(response){
                    document.getElementById('count_sec8').innerHTML = response;   
               sec8total();
                }   
    });

}

const sec8total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
           url: '../../process/admin/sec8_processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_sec8',
                     dateFrom:dateFrom,
                    dateTo:dateTo
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total8').innerHTML = response; 
               
                }   
    });
}

// Revisions (Vince)

const load_sec9  =()=>{
    var dateFrom = document.getElementById('auditedsec9datefrom').value;
    var dateTo = document.getElementById('auditedsec9dateto').value;
    var empid = document.getElementById('empid_sec9').value;
    var fname = document.getElementById('fname_sec9').value;
    var line = document.getElementById('linen_sec9').value;
    var carmaker = document.getElementById('carmaker_sec9').value;
    var carmodel = document.getElementById('carmodel_sec9').value;
    var position = document.getElementById('position_sec9').value;
    var audit_type = document.getElementById('audit_type_sec9').value;

    $.ajax({
        url: '../../process/admin/sec9_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'fetch_sec9',
            dateFrom:dateFrom,
            dateTo:dateTo,
            empid:empid,
            fname:fname,
            line:line,
            carmaker:carmaker,
            carmodel:carmodel,
            position:position,
            audit_type:audit_type
            
        },success:function(response){
            document.getElementById('preview_sec9_data').innerHTML = response;               
        }
    });          
}

// check all and uncheck
const uncheck_all_sec9 =()=>{
    var select_all = document.getElementById('check_all_audit_sec9');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sec9 =()=>{
    var select_all = document.getElementById('check_all_audit_sec9');
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

function export_sec9_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Section9'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sec9 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/sec9_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesec9',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_sec9();
             uncheck_all_sec9();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const sec9 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
        url: '../../process/admin/sec9_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'count_section9',
                dateFrom:dateFrom,
            dateTo:dateTo,
            audit_type:audit_type
            
        },success:function(response){
            document.getElementById('count_sec9').innerHTML = response;   
        sec9total();
        }   
    });

}

const sec9total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
        url: '../../process/admin/sec9_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'total_sec9',
                dateFrom:dateFrom,
            dateTo:dateTo
            
        },success:function(response){
            // console.log(response);
            document.getElementById('grand_total9').innerHTML = response; 
        
        }   
    });
}


const load_fp  =()=>{
    var dateFrom = document.getElementById('auditedfpdatefrom').value;
    var dateTo = document.getElementById('auditedfpdateto').value;
    var empid = document.getElementById('empid_fp').value;
    var fname = document.getElementById('fname_fp').value;
    var line = document.getElementById('linen_fp').value;
    var carmaker = document.getElementById('carmaker_fp').value;
    var carmodel = document.getElementById('carmodel_fp').value;
    var position = document.getElementById('position_fp').value;
    var audit_type = document.getElementById('audit_type_fp').value;
    var section = document.getElementById('section_fp').value;

    $.ajax({
        url: '../../process/admin/fp_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'fetch_fp',
            dateFrom:dateFrom,
            dateTo:dateTo,
            empid:empid,
            fname:fname,
            line:line,
            carmaker:carmaker,
            carmodel:carmodel,
            position:position,
            audit_type:audit_type,
            section:section
            
        },success:function(response){
            document.getElementById('preview_fp_data').innerHTML = response;               
        }
    });          
}

// check all and uncheck
const uncheck_all_fp =()=>{
    var select_all = document.getElementById('check_all_audit_fp');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_fp =()=>{
    var select_all = document.getElementById('check_all_audit_fp');
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

function export_fp_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_FirstProcess'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_fp =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/fp_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletefp',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_fp();
             uncheck_all_fp();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const fp =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
        url: '../../process/admin/fp_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'count_fp',
            dateFrom:dateFrom,
            dateTo:dateTo,
            audit_type:audit_type
            
        },success:function(response){
            document.getElementById('count_fp').innerHTML = response;   
            fptotal();
        }   
    });

}

const fptotal =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
        url: '../../process/admin/fp_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'total_fp',
            dateFrom:dateFrom,
            dateTo:dateTo
            
        },success:function(response){
            // console.log(response);
            document.getElementById('grand_total_fp').innerHTML = response; 
        
        }   
    });
}


const load_sp1  =()=>{
    var dateFrom = document.getElementById('auditedsp1datefrom').value;
    var dateTo = document.getElementById('auditedsp1dateto').value;
    var empid = document.getElementById('empid_sp1').value;
    var fname = document.getElementById('fname_sp1').value;
    var line = document.getElementById('linen_sp1').value;
    var carmaker = document.getElementById('carmaker_sp1').value;
    var carmodel = document.getElementById('carmodel_sp1').value;
    var position = document.getElementById('position_sp1').value;
    var audit_type = document.getElementById('audit_type_sp1').value;
    var section = document.getElementById('section_sp1').value;

    $.ajax({
        url: '../../process/admin/sp1_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'fetch_sp1',
            dateFrom:dateFrom,
            dateTo:dateTo,
            empid:empid,
            fname:fname,
            line:line,
            carmaker:carmaker,
            carmodel:carmodel,
            position:position,
            audit_type:audit_type,
            section:section
            
        },success:function(response){
            document.getElementById('preview_sp1_data').innerHTML = response;               
        }
    });          
}

// check all and uncheck
const uncheck_all_sp1 =()=>{
    var select_all = document.getElementById('check_all_audit_sp1');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sp1 =()=>{
    var select_all = document.getElementById('check_all_audit_sp1');
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

function export_sp1_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Secondary1Process'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sp1 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/sp1_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesp1',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_sp1();
             uncheck_all_sp1();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const sp1 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
        url: '../../process/admin/sp1_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'count_sp1',
            dateFrom:dateFrom,
            dateTo:dateTo,
            audit_type:audit_type
            
        },success:function(response){
            document.getElementById('count_sp1').innerHTML = response;   
            sp1total();
        }   
    });

}

const sp1total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
        url: '../../process/admin/sp1_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'total_sp1',
            dateFrom:dateFrom,
            dateTo:dateTo
            
        },success:function(response){
            // console.log(response);
            document.getElementById('grand_total_sp1').innerHTML = response; 
        
        }   
    });
}


const load_sp2  =()=>{
    var dateFrom = document.getElementById('auditedsp2datefrom').value;
    var dateTo = document.getElementById('auditedsp2dateto').value;
    var empid = document.getElementById('empid_sp2').value;
    var fname = document.getElementById('fname_sp2').value;
    var line = document.getElementById('linen_sp2').value;
    var carmaker = document.getElementById('carmaker_sp2').value;
    var carmodel = document.getElementById('carmodel_sp2').value;
    var position = document.getElementById('position_sp2').value;
    var audit_type = document.getElementById('audit_type_sp2').value;
    var section = document.getElementById('section_sp2').value;

    $.ajax({
        url: '../../process/admin/sp2_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'fetch_sp2',
            dateFrom:dateFrom,
            dateTo:dateTo,
            empid:empid,
            fname:fname,
            line:line,
            carmaker:carmaker,
            carmodel:carmodel,
            position:position,
            audit_type:audit_type,
            section:section
            
        },success:function(response){
            document.getElementById('preview_sp2_data').innerHTML = response;               
        }
    });          
}

// check all and uncheck
const uncheck_all_sp2 =()=>{
    var select_all = document.getElementById('check_all_audit_sp2');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_sp2 =()=>{
    var select_all = document.getElementById('check_all_audit_sp2');
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

function export_sp2_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Secondary2Process'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_sp2 =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/sp2_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deletesp2',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_sp2();
             uncheck_all_sp2();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const sp2 =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
        url: '../../process/admin/sp2_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'count_sp2',
            dateFrom:dateFrom,
            dateTo:dateTo,
            audit_type:audit_type
            
        },success:function(response){
            document.getElementById('count_sp2').innerHTML = response;   
            sp2total();
        }   
    });

}

const sp2total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
        url: '../../process/admin/sp2_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'total_sp2',
            dateFrom:dateFrom,
            dateTo:dateTo
            
        },success:function(response){
            // console.log(response);
            document.getElementById('grand_total_sp2').innerHTML = response; 
        
        }   
    });
}


const load_qa  =()=>{
    var dateFrom = document.getElementById('auditedqadatefrom').value;
    var dateTo = document.getElementById('auditedqadateto').value;
    var empid = document.getElementById('empid_qa').value;
    var fname = document.getElementById('fname_qa').value;
    var line = document.getElementById('linen_qa').value;
    var carmaker = document.getElementById('carmaker_qa').value;
    var carmodel = document.getElementById('carmodel_qa').value;
    var position = document.getElementById('position_qa').value;
    var audit_type = document.getElementById('audit_type_qa').value;
    var section = document.getElementById('section_qa').value;

    $.ajax({
        url: '../../process/admin/qa_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'fetch_qa',
            dateFrom:dateFrom,
            dateTo:dateTo,
            empid:empid,
            fname:fname,
            line:line,
            carmaker:carmaker,
            carmodel:carmodel,
            position:position,
            audit_type:audit_type,
            section:section
            
        },success:function(response){
            document.getElementById('preview_qa_data').innerHTML = response;               
        }
    });          
}

// check all and uncheck
const uncheck_all_qa =()=>{
    var select_all = document.getElementById('check_all_audit_qa');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_qa =()=>{
    var select_all = document.getElementById('check_all_audit_qa');
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

function export_qa_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_QA'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_qa =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/qa_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deleteqa',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_qa();
             uncheck_all_qa();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const qa =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    $.ajax({
        url: '../../process/admin/qa_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'count_qa',
            dateFrom:dateFrom,
            dateTo:dateTo,
            audit_type:audit_type
            
        },success:function(response){
            document.getElementById('count_qa').innerHTML = response;   
            qatotal();
        }   
    });

}

const qatotal =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    $.ajax({
        url: '../../process/admin/qa_processor.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'total_qa',
            dateFrom:dateFrom,
            dateTo:dateTo
            
        },success:function(response){
            // console.log(response);
            document.getElementById('grand_total_qa').innerHTML = response; 
        
        }   
    });
}


const load_other =()=>{
         var dateFrom = document.getElementById('otherdatefrom').value;
         var dateTo = document.getElementById('otherdateto').value;
         var empid = document.getElementById('empid_other').value;
         var fname = document.getElementById('fname_other').value;
         var line = document.getElementById('linen_other').value;
         var carmaker = document.getElementById('carmaker_other').value;
         var carmodel = document.getElementById('carmodel_other').value;
         var position = document.getElementById('position_other').value;
         var audit_type = document.getElementById('audit_type_other').value;
         var og = document.getElementById('other_prev').value;

           $.ajax({
                url: '../../process/admin/other_group.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_og',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type,
                    og:og
                    
                },success:function(response){
                    document.getElementById('preview_other_data').innerHTML = response;               
                }
            });          
}

// check all and uncheck
const uncheck_all_other =()=>{
    var select_all = document.getElementById('check_all_audit_other');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_other =()=>{
    var select_all = document.getElementById('check_all_audit_other');
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

function export_other_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Other_Group'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_other =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/other_group.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deleteother',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_other();
             uncheck_all_other();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const other_group =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    var og = document.getElementById('other_pending').value;
    $.ajax({
           url: '../../process/admin/other_group.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_groups',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type,
                    og:og
                    
                },success:function(response){
                    document.getElementById('count_group').innerHTML = response;   
               og_total();
                }   
    });

}

const og_total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var og = document.getElementById('other_pending').value;
    $.ajax({
           url: '../../process/admin/other_group.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_other',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    og:og
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total_group').innerHTML = response; 
               
                }   
    });
}


const load_provider =()=>{
         var dateFrom = document.getElementById('otherdatefrom').value;
         var dateTo = document.getElementById('otherdateto').value;
         var empid = document.getElementById('empid_other').value;
         var fname = document.getElementById('fname_other').value;
         var line = document.getElementById('linen_other').value;
         var carmaker = document.getElementById('carmaker_other').value;
         var carmodel = document.getElementById('carmodel_other').value;
         var position = document.getElementById('position_other').value;
         var audit_type = document.getElementById('audit_type_other').value;
         var provider = document.getElementById('provider_prev').value;

           $.ajax({
                url: '../../process/admin/providers.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_provider',
                    dateFrom:dateFrom,
                    dateTo:dateTo,
                    empid:empid,
                    fname:fname,
                    line:line,
                    carmaker:carmaker,
                    carmodel:carmodel,
                    position:position,
                    audit_type:audit_type,
                    provider:provider
                    
                },success:function(response){
                    document.getElementById('preview_provider_data').innerHTML = response;               
                }
            });          
}

// check all and uncheck
const uncheck_all_provider =()=>{
    var select_all = document.getElementById('check_all_audit_provider');
    select_all.checked = false;
    $('.singleCheck').each(function(){
        this.checked=false;
    });
}
const select_all_func_provider =()=>{
    var select_all = document.getElementById('check_all_audit_provider');
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

function export_provider_pending(table_id, separator = ',') {
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
    var filename = 'List_of_Audit_Findings_Provider'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

const delete_provider =()=>{
   var arr = [];
    $('input.singleCheck:checkbox:checked').each(function () {
        arr.push($(this).val());
    });
    var numberOfChecked = arr.length;
    if(numberOfChecked > 0){

    $.ajax({
        url: '../../process/admin/providers.php',
        type: 'POST',
        cache: false,
        data:{
            method: 'deleteprovider',
            id:arr    
        },success:function(response) {
            if (response == 'success') {
             load_other();
             uncheck_all_other();
                swal('SUCCESS!', 'Success', 'success');
               
            }else{
                swal('FAILED', 'FAILED', 'error');
            }
        }
    });
   }
}

const providers =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var audit_type = document.getElementById('audit_type').value;
    var provider = document.getElementById('provider_pending').value;
    $.ajax({
           url: '../../process/admin/providers.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'count_provider',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    audit_type:audit_type,
                    provider:provider
                    
                },success:function(response){
                    document.getElementById('count_provider').innerHTML = response;   
               provider_total();
                }   
    });

}

const provider_total =()=>{
    var dateFrom = document.getElementById('auditeddatefrom').value;
    var dateTo = document.getElementById('auditeddateto').value;
    var provider = document.getElementById('provider_pending').value;
    $.ajax({
           url: '../../process/admin/providers.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'total_provider',
                     dateFrom:dateFrom,
                    dateTo:dateTo,
                    provider:provider
                    
                },success:function(response){
                    // console.log(response);
                    document.getElementById('grand_total_provider').innerHTML = response; 
               
                }   
    });
}
</script>