<script type="text/javascript">

    // Revisions (Vince)
    const fetch_section_dropdown = opt => {
        let falp_group = '';
        if (opt == 1) {
            falp_group = document.getElementById('falp_group_accounts').value;
        } else if (opt == 2) {
            falp_group = document.getElementById('falp_group_update_accounts').value;
        }

        $.ajax({
            url: '../../process/admin/sections.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_section_dropdown',
                falp_group: falp_group
            },
            success: function (response) {
                $('#section_accounts').html(response);
                $('#section_update_accounts').html(response);
            }
        });
    }

    const load_users = () => {
        var username = document.getElementById('user_name_user_search').value;

        $.ajax({
            url: '../../process/admin/accounts.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_user',
                username: username
            }, success: function (response) {
                document.getElementById('list_of_users').innerHTML = response;
            }
        });
    }

    const register_user = () => {
        var username = document.getElementById('username_accounts').value;
        var password = document.getElementById('password_accounts').value;
        var role = document.getElementById('role_accounts').value;
        var esection = document.getElementById('esection_accounts').value;
        var carmaker = document.getElementById('carmaker_accounts').value;
        var section = document.getElementById('section_accounts').value;
        var falp_group = document.getElementById('falp_group_accounts').value;

        if (username == '') {
            swal('Information', 'Please Input Username', 'info');
        } else if (password == '') {
            swal('Information', 'Please Input Password', 'info');
        } else if (role == '') {
            swal('Information', 'Please Select Role', 'info');
        } else if (esection == '') {
            swal('Information', 'Please Input Type', 'info');
        } else {

            $.ajax({
                url: '../../process/admin/accounts.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'register_users',
                    username: username,
                    password: password,
                    role: role,
                    esection: esection,
                    carmaker: carmaker,
                    section: section,
                    falp_group: falp_group
                }, success: function (response) {

                    if (response == 'Already Exist') {
                        swal('Information', 'Username Already Exist!', 'info');
                        $('#username_accounts').val('');
                        $('#password_accounts').val('');
                        $('#role_accounts').val('');
                        $('#esection_accounts').val('');
                        $('#carmaker_accounts').val('');
                        $('#section_accounts').val('');
                        $('#falp_group_accounts').val('');
                    }
                    else if (response == 'success') {
                        $('#username_accounts').val('');
                        $('#password_accounts').val('');
                        $('#role_accounts').val('');
                        $('#esection_accounts').val('');
                        $('#carmaker_accounts').val('');
                        $('#section_accounts').val('');
                        $('#falp_group_accounts').val('');
                        swal('Success', 'Successfully Registered!', 'success');
                        load_users();

                    } else {
                        swal('Error', 'Error!', 'error');
                    }
                }
            });
        }
    }

    const get_user_details = (param) => {
        var string = param.split('~!~');
        var id = string[0];
        var username = string[1];
        var password = string[2];
        var role = string[3];
        var esection = string[4];
        var car_maker = string[5];
        var sections = string[6];
        var falp_group = string[7];

        document.getElementById('id_update_accounts').value = id;
        document.getElementById('username_update_accounts').value = username;
        document.getElementById('password_update_accounts').value = password;
        document.getElementById('role_update_accounts').value = role;
        document.getElementById('esection_update_accounts').value = esection;
        document.getElementById('carmaker_update_accounts').value = car_maker;
        document.getElementById('falp_group_update_accounts').value = falp_group;

        fetch_section_dropdown(2);

        setTimeout(() => {
            document.getElementById('section_update_accounts').value = sections;
        }, 500);
    }

    const delete_user = () => {
        var id = document.getElementById('id_update_accounts').value;

        $.ajax({
            url: '../../process/admin/accounts.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_user',
                id: id
            }, success: function (response) {

                if (response == 'success') {
                    swal('Information', 'Successfully Deleted', 'info');
                    load_users();
                } else {
                    swal('Error', 'Error', 'error');
                }
            }
        });
    }

    const update_user = () => {
        var id = document.getElementById('id_update_accounts').value;
        var username = document.getElementById('username_update_accounts').value;
        var password = document.getElementById('password_update_accounts').value;
        var role = document.getElementById('role_update_accounts').value;
        var esection = document.getElementById('esection_update_accounts').value;
        var carmaker = document.getElementById('carmaker_update_accounts').value;
        var section = document.getElementById('section_update_accounts').value;
        var falp_group = document.getElementById('falp_group_update_accounts').value;

        if (username == '') {
            swal('Information', 'Please Input Username', 'info');
        } else if (password == '') {
            swal('Information', 'Please Input Password', 'info');
        } else if (role == '') {
            swal('Information', 'Please Select Role', 'info');
        } else if (esection == '') {
            swal('Information', 'Please Input Type', 'info');
        } else {

            $.ajax({
                url: '../../process/admin/accounts.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'update_user',
                    id: id,
                    username: username,
                    password: password,
                    role: role,
                    esection: esection,
                    carmaker: carmaker,
                    section: section,
                    falp_group: falp_group
                }, success: function (response) {

                    if (response == 'Already Exist') {
                        swal('Information', 'Username Already Exist!', 'info');
                    }
                    else if (response == 'success') {
                        swal('Success', 'Successfully Updated!', 'success');
                        load_users();
                    } else {
                        swal('Error', 'Error!', 'error');
                    }
                }
            });
        }
    }
</script>