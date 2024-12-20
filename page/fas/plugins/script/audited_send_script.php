<script type="text/javascript">

    $(document).ready(function () {
        fetch_section_dropdown();
    });

    // Revisions (Vince)
    const fetch_section_dropdown = () => {
        let falp_group = '<?= htmlspecialchars($_SESSION['falp_group']); ?>';

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section_send').html(response);
            }
        });
    }

    const load_list_of_audited_send = () => {
        $('#spinner').css('display', 'block');
        var empid = document.getElementById('empid_audited_fass_send').value;
        var fname = document.getElementById('fname_audited_fass_send').value;
        var lname = document.getElementById('linename_audited_fass_send').value;
        var dateFrom = document.getElementById('fasauditedliststatussenddatefrom').value;
        var dateTo = document.getElementById('fasauditedliststatussenddateto').value;
        var position = document.getElementById('position_send').value;
        var carmaker = document.getElementById('carmaker_send').value;
        var carmodel = document.getElementById('carmodel_send').value;
        var audit_type = document.getElementById('audit_type_send').value;
        var esection = '<?= htmlspecialchars($_SESSION['esection']); ?>';
        var criticality_level = document.getElementById('criticality_level_send').value;
        var section = document.getElementById('section_send').value;
        var falp_group = '<?= htmlspecialchars($_SESSION['falp_group']); ?>';
        var group = document.getElementById('groups_fas_sent').value;
        var shift = document.getElementById('shifts_fas_sent').value;
        var audit_category = document.getElementById('audit_category_search').value;

        $.ajax({
            url: '../../process/fas/audited_send_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_audited_list_send',
                dateFrom: dateFrom,
                dateTo: dateTo,
                empid: empid,
                fname: fname,
                esection: esection,
                lname: lname,
                position: position,
                carmaker: carmaker,
                carmodel: carmodel,
                audit_type: audit_type,
                criticality_level: criticality_level,
                section: section,
                falp_group: falp_group,
                group: group,
                shift: shift,
                audit_category: audit_category

            }, success: function (response) {
                document.getElementById('audited_data_send').innerHTML = response;
                $('#spinner').fadeOut(function () {
                });
            }
        });
    }

    function export_audit_list_sent(table_id, separator = ',') {
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
        var filename = 'List_of_Audit_Findings_Sent' + '_' + new Date().toLocaleDateString() + '.csv';
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