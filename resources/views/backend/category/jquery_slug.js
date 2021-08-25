//first input e ja likha thakbe porer ta te tai ashbe

$('#title').keyup(function() {
    $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
});



//js check all box

<
input type = "checkbox"
id = "checkAll" >


    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });