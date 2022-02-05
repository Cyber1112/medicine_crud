var idd;
$(document).on('click', '.edit_table', function() {
    idd = $(this).data('id');
});
var idMed;
$(document).on('click', '.delete_row', function() {
  idMed = $(this).data('id');
});
$(document).ready(() => {
    $('#updateMedicine').click((e) => {
        const medicine_name = $('#medicine_namee').val();
        const dosage = $('#dosagee').val();
        const frequency = $('#frequencyy').val();
        $.ajax({
            type: 'post',
            url: 'api/functions/editMedicine.php',
            async: false,
            data: {
                medicine_id: idd,
                medicine_name: medicine_name,
                dosage: dosage,
                frequency: frequency
            },
            success: () => {
              console.log("Everything good");
                $('#medicine_name').val("");
                $('#dosage').val("");
                $('#frequency').val("");
            },
            statusCode: {
                500: () => {
                  console.log('internal error');
                }
            }
        });
  
    });

    $('#deleteMedicine').click((e) => {
        $.ajax({
            type: 'post',
            url: 'api/functions/deleteMedicine.php',
            async: false,
            data: {
                medicine_id: idMed,
            },
            success: () => {
              console.log("Everything good")
            },
            statusCode: {
                500: () => {
                  console.log('internal error');
                }
            }
        });
    });


  });