$(document).ready(function() {
    $(function(){
        $("#btnAdd").click(function(){
            $("#tblData tbody").append(
                "<tr>"+
                    "<td><input type='text' class='form-control' name='no[]' placeholder='Enter Name'></td>"+
                    "<td><input type='text' class='form-control' name='nama[]' placeholder='Enter Name'></td>"+
                    "<td><input type='text' class='form-control' name='jumlah[]' placeholder='Enter Name'></td>"+
                    "<td><input type='text' class='form-control' name='lokasi[]' placeholder='Enter Name'></td>"+
                    "<td><input type='text' class='form-control' name='keterangan[]' placeholder='Enter Name'></td>"+
                    "<td><input type='text' class='form-control' name='supplier[]' placeholder='Enter Name'></td>"+
                    "<td><input type='text' class='form-control' name='harga[]' placeholder='Enter Name'></td>"+
                    "<td><button class='btn btn-link remove_field' role='button'> x </button></td>"+
                "</tr>");
        });

        $("button.btn.btn-link.remove_field").click(function(){
            alert('tes');
            $(this).parent().parent().remove();
        });
    });
});