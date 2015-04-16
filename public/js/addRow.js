$(document).ready(function() {
    $(function(){
        $("#btnAdd").click(function(){
            $("#tblData tbody").append(
                "<tr>"+
                    "<td><input type='text' class='form-control' name='no[]' placeholder='No Komponen'></td>"+
                    "<td><input type='text' class='form-control' name='nama[]' placeholder='Nama Komponen'></td>"+
                    "<td><input type='text' class='form-control' name='jumlah[]' placeholder='Jumlah'></td>"+
                    "<td><input type='text' class='form-control' name='lokasi[]' placeholder='Lokasi'></td>"+
                    "<td><input type='text' class='form-control' name='keterangan[]' placeholder='Keterangan'></td>"+
                    "<td><input type='text' class='form-control' name='supplier[]' placeholder='Supplier'></td>"+
                    "<td><input type='text' class='form-control' name='harga[]' placeholder='Harga'></td>"+
                    "<td><button class='btn btn-link remove_field' role='button'> x </button></td>"+
                "</tr>");
        });

        $(".remove_field").click(function(){
            alert('tes');
            $(this).parent().parent().remove();
        });

        $("#btnRes").click(function(){
            $("tbody").empty();
        });
    });
});