function createPDF() {
    window.print();
}

$(document).ready(function() {
	var base = "http://localhost:8000"
    $(function(){
    	$(".images").on("click", function() {
		    var res = confirm("Yakin ingin diprint? Aksi tidak dapat di-undo setelah 'OK'");
		    if (res) {
		    	var no_seri = $( '.namabarang' ).map(function () { return $( this ).text(); }).get();
		    	$.ajaxSetup({
				   headers: { 'X-CSRF-TOKEN' : $('input[name=_token]').val() }
				});
		    	$.ajax({
				    type: 'post',
				    url: base + '/admin/status',
				    data: {no_seri_barang_rusak: no_seri},
				    success: function(data) {
				    	if (data=="finish") {
				    		createPDF();
				    		$.amaran({content:{'message':'Status Barang telah diubah'}});
				    	}
				    },
				    error: function(data) {
				    	$.amaran({content:{'message':'Terjadi kesalahan pada sistem!'}});
				    }
				});
		    } else {
		    	// do nothing
		    }
		});
    });
});