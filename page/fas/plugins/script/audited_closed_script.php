<script type="text/javascript">

    $(document).ready(function () {
        fetch_section_dropdown();
    });

    // Revisions (Vince)
    const fetch_section_dropdown = () => {
        let falp_group = document.getElementById('falp_group_closed').value;

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section_closed').html(response);
            }
        });
    }

    const closed = () => {
        $('#spinner').css('display', 'block');
        var empid = document.getElementById('empid_audited_fas_closed').value;
        var fname = document.getElementById('fname_audited_fas_closed').value;
        var lname = document.getElementById('linename_audited_fas_closed').value;
        var dateFrom = document.getElementById('recievedfrom_closed').value;
        var dateTo = document.getElementById('recievedto_closed').value;
        var esection = '<?= htmlspecialchars($_SESSION['esection']); ?>';
        var carmaker = document.getElementById('carmaker_closed').value;
        var carmodel = document.getElementById('carmodel_closed').value;
        var section = document.getElementById('section_closed').value;
        var falp_group = document.getElementById('falp_group_closed').value;
        var audit_type = document.getElementById('audit_type_closed').value;
        var position = document.getElementById('position_closed').value;
        var criticality_level = document.getElementById('criticality_level_closed').value;
        var group = document.getElementById('groups_fas_closed').value;
        var shift = document.getElementById('shifts_fas_closed').value;
        var audit_category = document.getElementById('audit_category_search').value;

        $.ajax({
            url: '../../process/fas/audited_closed_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_closed_fas',
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
                audit_category: audit_category
            }, success: function (response) {
                document.getElementById('audited_closed_fas').innerHTML = response;
                $('#spinner').fadeOut(function () {
                });
            }
        });
    }


    function export_audit_list_closed(table_id, separator = ',') {
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
        var filename = 'List_of_Audit_Findings_Closed' + '_' + new Date().toLocaleDateString() + '.csv';
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