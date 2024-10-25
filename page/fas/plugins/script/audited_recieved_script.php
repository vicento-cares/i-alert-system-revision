<script type="text/javascript">

    $(document).ready(function () {
        fetch_section_dropdown();
    });

    // Revisions (Vince)
    const fetch_section_dropdown = () => {
        let falp_group = document.getElementById('falp_group_recieved').value;

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section_recieved').html(response);
            }
        });
    }

    const recieved = () => {
        $('#spinner').css('display', 'block');
        var empid = document.getElementById('empid_audited_fas_recieved').value;
        var fname = document.getElementById('fname_audited_fas_recieved').value;
        var lname = document.getElementById('linename_audited_fas_recieved').value;
        var dateFrom = document.getElementById('recievedfrom').value;
        var dateTo = document.getElementById('recievedto').value;
        var esection = '<?= htmlspecialchars($_SESSION['esection']); ?>';
        var carmaker = document.getElementById('carmaker_recieved').value;
        var carmodel = document.getElementById('carmodel_recieved').value;
        var section = document.getElementById('section_recieved').value;
        var falp_group = document.getElementById('falp_group_recieved').value;
        var audit_type = document.getElementById('audit_type_recieved').value;
        var position = document.getElementById('position_recieved').value;
        var criticality_level = document.getElementById('criticality_level_recieved').value;
        var group = document.getElementById('groups_fas_received').value;
        var shift = document.getElementById('shifts_fas_received').value;

        $.ajax({
            url: '../../process/fas/audited_recieved_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_recieve_fas',
                dateFrom: dateFrom,
                dateTo: dateTo,
                empid: empid,
                fname: fname,
                esection: esection,
                lname: lname,
                carmaker: carmaker,
                carmodel: carmodel,
                section: section,
                falp_group: falp_group,
                audit_type: audit_type,
                position: position,
                criticality_level: criticality_level,
                group: group,
                shift: shift,
                section: section
            }, success: function (response) {
                document.getElementById('audited_recieved_fas').innerHTML = response;
                $('#spinner').fadeOut(function () {
                });
            }
        });
    }

    function export_audit_list_recieved(table_id, separator = ',') {
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
        var filename = 'List_of_Audit_Findings_Recieved' + '_' + new Date().toLocaleDateString() + '.csv';
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