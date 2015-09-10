function createPDF() {
    window.print();
}

$(document).ready(function() {
	var base = "http://localhost:8000"
    $(function(){
    	$(".print-button").on("click", function() {
		    var res = confirm("Yakin ingin diprint? Aksi tidak dapat di-undo setelah 'OK'");
		    var tagihan = $('#no_tagihan').val();
		    if (res) {
		    	if (tagihan==""){
		    		alert("Anda belum memasukan nomor tagihan");
		    	} else {
		    		var no_seri = $('.namabarang_full').map(function () { return $( this ).text(); }).get();
			    	$.ajaxSetup({
					   headers: { 'X-CSRF-TOKEN' : $('input[name=_token]').val() }
					});
			    	$.ajax({
					    type: 'post',
					    url: base + '/admin/status',
					    data: {no_seri_barang_rusak: no_seri, no_tagihan: tagihan},
					    success: function(data) {
					    	if (data=="finish") {
					    		createPDF();
					    		$.amaran({content:{'message':'Status Barang telah diubah'}});
					    		window.location = "/admin/perusahaan-unbilled";
					    	}
					    },
					    error: function(data) {
					    	$.amaran({content:{'message':'Terjadi kesalahan pada sistem!'}});
					    }
					});
		    	}
		    } else {
		    	// do nothing
		    }
		});
    });
});