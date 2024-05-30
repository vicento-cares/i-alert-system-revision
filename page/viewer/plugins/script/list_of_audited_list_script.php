<script type="text/javascript">

    $(document).ready(function () {
        fetch_process_dropdown();
        fetch_group_dropdown();
    });

    // Revisions (Vince)
    const fetch_process_dropdown = () => {
        $.ajax({
            url: '../../process/viewer/list_of_audited_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_process_dropdown'
            },
            success: function (response) {
                $('#process_audited').html(response);
            }
        });
    }
    
    const fetch_group_dropdown = () => {
        $.ajax({
            url: '../../process/viewer/list_of_audited_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_group_dropdown'
            },
            success: function (response) {
                $('#falp_group_audited').html(response);
            }
        });
    }

    const load_list_of_audited_findings = () => {
        $('#spinner').css('display', 'block');
        var empid = document.getElementById('empid_audited').value;
        var fname = document.getElementById('fname_audited').value;
        var lname = document.getElementById('lname_audited').value;
        var dateFrom = document.getElementById('auditedlistdatefrom').value;
        var dateTo = document.getElementById('auditedlistdateto').value;
        var position = document.getElementById('position_audited').value;
        var carmaker = document.getElementById('carmaker_audited').value;
        var carmodel = document.getElementById('carmodel_audited').value;
        var audit_type = document.getElementById('audit_type_audited').value;
        var audit_categ = document.getElementById('audit_categ_audited').value;
        var section = document.getElementById('section_audited').value;
        var provider = document.getElementById('provider_audited').value;
        var process = document.getElementById('process_audited').value;
        var falp_group = document.getElementById('falp_group_audited').value;

        $.ajax({
            url: '../../process/viewer/list_of_audited_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_audited_list',
                dateFrom: dateFrom,
                dateTo: dateTo,
                empid: empid,
                fname: fname,
                lname: lname,
                position: position,
                carmaker: carmaker,
                carmodel: carmodel,
                audit_type: audit_type,
                audit_categ: audit_categ,
                section: section,
                provider: provider,
                process: process,
                falp_group: falp_group,

            }, success: function (response) {
                document.getElementById('audited_data').innerHTML = response;
                $('#spinner').fadeOut(function () {
                });
            }
        });
    }

    function export_audited_list(table_id, separator = ',') {
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
        var filename = 'List_of_Audited_Findings' + '_' + new Date().toLocaleDateString() + '.csv';
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