$(document).ready(function() {
	var i = 0;
    $(function(){
        $(".approve").click(function(){
            var stok = $(this).closest('tr').find('.stok').text();
            var jumlah = $(this).closest('tr').find('.jumlah').text();
            var min = $(this).closest('tr').find('.jumlahminkomponen').text();
            
            if (stok-jumlah <= min){
                alert('Stok kurang! Tidak dapat memproses permintaan');
            } else{
                $('#noserikomponen').val($(this).closest('tr').find('.nokomponen').text());
                $('#jumlahkomponen').val($(this).closest('tr').find('.jumlah').text());
                $('#stokkomponen').val($(this).closest('tr').find('.stok').text());
                $('#noseribarangrusak').val($(this).closest('tr').find('.nobarang').text());
                $('#username').val($(this).closest('tr').find('.user').text());
                $('#tombol').val("approved");
            }
        });
    });

    // $(function(){
    //     $(".decline").click(function(){
    //         $('#noserikomponen').val($(this).closest('tr').find('.nokomponen').text());
    //         $('#noseribarangrusak').val($(this).closest('tr').find('.nobarang').text());
    //         $('#username').val($(this).closest('tr').find('.user').text());
    //         $('#tombol').val("decline");
    //     });
    // });
});