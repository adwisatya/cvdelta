$(document).ready(function() {
    $(function(){
        $(".pilihTeknisi").click(function(){
            $('#noseri').val($(this).closest('td').attr('id'));
        });

        $(".selesai").click(function(){
        	$('#idbarang').val($(this).closest('td').attr('id'));
        });
    });
});