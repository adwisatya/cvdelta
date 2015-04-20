$(document).ready(function() {
	var i = 0;
    $(function(){
        $(".approve").click(function(){
            $('#noserikomponen').val($(this).closest('tr').find('.nokomponen').text());
            $('#noseribarangrusak').val($(this).closest('tr').find('.nobarang').text());
            $('#username').val($(this).closest('tr').find('.user').text());
            $('#tombol').val("approved");
        });
    });

    $(function(){
        $(".decline").click(function(){
            $('#noserikomponen').val($(this).closest('tr').find('.nokomponen').text());
            $('#noseribarangrusak').val($(this).closest('tr').find('.nobarang').text());
            $('#username').val($(this).closest('tr').find('.user').text());
            $('#tombol').val("decline");
        });
    });
});