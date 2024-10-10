<script type="text/javascript">

    const load_sections = () => {
        var section = document.getElementById('section_name').value;

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section',
                section: section
            }, success: function (response) {
                document.getElementById('list_of_sections').innerHTML = response;
                sessionStorage.setItem('ialert_sections_section_search', section);
            }
        });
    }

    const register_section = () => {
        var section_code = document.getElementById('sec_code').value;
        var dept = document.getElementById('sec_dept').value;
        var falp_group = document.getElementById('sec_falp_group').value;
        var section = document.getElementById('sec_name').value;

        if (dept == '') {
            swal('Information', 'Please Input Department', 'info');
        } else if (falp_group == '') {
            swal('Information', 'Please Input Group', 'info');
        } else if (section == '') {
            swal('Information', 'Please Input Section Name', 'info');
        } else if (section_code == '') {
            swal('Information', 'Please Input Section Code', 'info');
        } else {
            $.ajax({
                url: '../../process/admin/sections.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'register_section',
                    section_code: section_code,
                    section: section,
                    falp_group: falp_group,
                    dept: dept
                }, success: function (response) {
                    if (response == 'Already Exist') {
                        swal('Information', 'Section Already Exist!', 'info');
                        $('#sec_code').val('');
                        $('#sec_name').val('');
                        $('#sec_falp_group').val('');
                        $('#sec_dept').val('');
                    }
                    else if (response == 'success') {
                        $('#sec_code').val('');
                        $('#sec_name').val('');
                        $('#sec_falp_group').val('');
                        $('#sec_dept').val('');
                        swal('Success', 'Successfully Registered!', 'success');
                        load_sections();

                    } else {
                        swal('Error', 'Error!', 'error');
                    }
                }
            });
        }
    }

    const get_sections_details = (param) => {
        var string = param.split('~!~');
        var id = string[0];
        var section_code = string[1];
        var dept = string[2];
        var falp_group = string[3];
        var section = string[4];

        document.getElementById('id_update_sec').value = id;
        document.getElementById('sec_code_update').value = section_code;
        document.getElementById('sec_dept_update').value = dept;
        document.getElementById('sec_falp_group_update').value = falp_group;
        document.getElementById('sec_name_update').value = section;
    }

    const delete_section = () => {
        var id = document.getElementById('id_update_sec').value;

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_section',
                id: id
            }, success: function (response) {
                if (response == 'success') {
                    swal('Information', 'Successfully Deleted', 'info');
                    load_sections();
                } else {
                    swal('Error', 'Error', 'error');
                }
            }
        });
    }

    const update_section = () => {
        var id = document.getElementById('id_update_sec').value;
        var section_code = document.getElementById('sec_code_update').value;
        var section = document.getElementById('sec_name_update').value;
        var falp_group = document.getElementById('sec_falp_group_update').value;
        var dept = document.getElementById('sec_dept_update').value;
        
        if (dept == '') {
            swal('Information', 'Please Input Department', 'info');
        } else if (falp_group == '') {
            swal('Information', 'Please Input Group', 'info');
        } else if (section == '') {
            swal('Information', 'Please Input Section Name', 'info');
        } else if (section_code == '') {
            swal('Information', 'Please Input Section Code', 'info');
        } else {
            $.ajax({
                url: '../../process/admin/sections.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'update_sections',
                    id: id,
                    section_code: section_code,
                    section: section,
                    falp_group: falp_group,
                    dept: dept
                }, success: function (response) {
                    if (response == 'Already Exist') {
                        swal('Information', 'Section Already Exist!', 'info');
                    }
                    else if (response == 'success') {
                        swal('Success', 'Successfully Updated!', 'success');
                        load_sections();
                    } else {
                        swal('Error', 'Error!', 'error');
                    }
                }
            });
        }
    }

    const export_sections = (table_id, separator = ',') => {
		let section = sessionStorage.getItem('ialert_sections_section_search');

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
        var filename = 'I-Alert_Sections_';
		if (section) {
			filename += '_' + section;
		}
		filename += '_' + new Date().toJSON().slice(0, 10) + '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>