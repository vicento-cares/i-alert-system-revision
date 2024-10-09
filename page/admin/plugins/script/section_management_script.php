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
</script>