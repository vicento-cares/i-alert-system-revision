<script type="text/javascript">

    document.getElementById('daily_report_search_form').addEventListener('submit', e => {
        e.preventDefault();
        get_daily_report();
    });

    const get_daily_report = () => {
        let daily_report_date_from = document.getElementById('daily_report_date_from').value;
        let daily_report_date_to = document.getElementById('daily_report_date_to').value;

        $.ajax({
            url: '../../process/admin/daily_report_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'get_daily_report',
                daily_report_date_from: daily_report_date_from,
                daily_report_date_to: daily_report_date_to
            }, success: function (response) {
                document.getElementById('list_of_daily_reports').innerHTML = response;
                sessionStorage.setItem('ialert_daily_report_date_from', daily_report_date_from);
                sessionStorage.setItem('ialert_daily_report_date_to', daily_report_date_to);
            }
        });
    }

    const export_daily_report_list = (table_id, separator = ',') => {
		let daily_report_date_from = sessionStorage.getItem('ialert_daily_report_date_from');
        let daily_report_date_to = sessionStorage.getItem('ialert_daily_report_date_to');

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
        var filename = 'I-Alert_DailyReportList_';
		if (daily_report_date_from) {
			filename += '_' + daily_report_date_from;
		}
        if (daily_report_date_to) {
			filename += '_' + daily_report_date_to;
		}
		filename += '.csv';
        var link = document.createElement('a');
        link.style.display = 'none';
        link.setAttribute('target', '_blank');
        link.setAttribute('href', 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURIComponent(csv_string));
        link.setAttribute('download', filename);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    document.getElementById('add_daily_report_form').addEventListener('submit', e => {
        e.preventDefault();
        upload_daily_report();
    });

    const upload_daily_report = () => {
        var file_form = document.getElementById('add_daily_report_form');
        var form_data = new FormData(file_form);
        form_data.append("method", 'upload_daily_report');

        $.ajax({
            url: '../../process/admin/daily_report_processor.php',
            type: 'POST',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            beforeSend: (jqXHR, settings) => {
                swal('Daily Report', 'Uploading please wait...', {
                    buttons: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                });
                jqXHR.url = settings.url;
                jqXHR.type = settings.type;
            },
            success: response => {
                setTimeout(() => {
                    swal.close();
                    if (response != '') {
                        swal('Daily Report Error', `Error: ${response}`, 'error');
                    } else {
                        swal('Daily Report', 'Uploaded and updated successfully', 'success');
                        $("#add_daily_report").modal("hide");
                        document.getElementById("daily_report_file").value = '';
                    }
                }, 500);
            }
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            console.error(`System Error: Call IT Personnel Immediately!!! They will fix it right away. Error: url: ${jqXHR.url}, method: ${jqXHR.type} ( HTTP ${jqXHR.status} - ${jqXHR.statusText} ) Press F12 to see Console Log for more info.`);
        });
    }

    const get_details_daily_report = el => {
        var id = el.dataset.id;
        var daily_report_date = el.dataset.daily_report_date;
        var file_name = el.dataset.file_name;
        var file_url = el.dataset.file_url;

        document.getElementById("id_update_dr").value = id;
        document.getElementById("daily_report_date_update").value = daily_report_date;
        document.getElementById("daily_report_file_name_update").value = file_name;
        document.getElementById("daily_report_file_name_label_update").innerHTML = file_name;
        document.getElementById("daily_report_file_url_update").value = file_url;
    }

    // Get the form element
    var update_daily_report_form = document.getElementById('update_daily_report_form');

    // Add a submit event listener to the form
    update_daily_report_form.addEventListener('submit', e => {
        e.preventDefault();

        // Get the button that triggered the submit event
        var button = document.activeElement;

        // Check the id or name of the button
        if (button.id === 'btnUpdateDailyReportDate') {
            // Call the function for the first submit button
            update_daily_report(1);
        } else if (button.id === 'btnUpdateDailyReportFile') {
            // Call the function for the first submit button
            update_daily_report(2);
        } else if (button.id === 'btnDeleteDailyReport') {
            // Call the function for the first submit button
            delete_daily_report();
        }
    });

    const update_daily_report = opt => {
        var file_form = document.getElementById('update_daily_report_form');
        var form_data = new FormData(file_form);

        if (opt == 1) {
            form_data.append("method", 'update_daily_report_date');
        } else if (opt == 2) {
            form_data.append("method", 'update_daily_report');
        }

        $.ajax({
            url: '../../process/admin/daily_report_processor.php',
            type: 'POST',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            beforeSend: (jqXHR, settings) => {
                swal('Daily Report', 'Updating please wait...', {
                    buttons: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                });
                jqXHR.url = settings.url;
                jqXHR.type = settings.type;
            },
            success: response => {
                setTimeout(() => {
                    swal.close();
                    if (response != '') {
                        swal('Daily Report Error', `Error: ${response}`, 'error');
                    } else {
                        swal('Daily Report', 'Uploaded and updated successfully', 'success');
                        $("#update_daily_report").modal("hide");
                        document.getElementById("daily_report_date_update").value = '';
                    }
                }, 500);
            }
        })
        .fail((jqXHR, textStatus, errorThrown) => {
            console.error(`System Error: Call IT Personnel Immediately!!! They will fix it right away. Error: url: ${jqXHR.url}, method: ${jqXHR.type} ( HTTP ${jqXHR.status} - ${jqXHR.statusText} ) Press F12 to see Console Log for more info.`);
        });
    }

    const delete_daily_report = () => {
        var id = document.getElementById('id_update_dr').value;

        $.ajax({
            url: '../../process/admin/daily_report_processor.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_daily_report',
                id: id
            }, success: function (response) {
                if (response == 'success') {
                    swal('Information', 'Successfully Deleted', 'info');
                    $("#update_daily_report").modal("hide");
                    get_daily_report();
                } else {
                    swal('Error', response, 'error');
                }
            }
        });
    }
</script>