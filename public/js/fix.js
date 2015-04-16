$(document).ready(function() {
    $(function(){
        $(".pilihTeknisi").click(function(){
            $('#noseri').val($(this).closest('td').attr('id'));
        });
    });
});