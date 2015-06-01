function createPDF() {
    window.print();
}

$(document).ready(function () {
	$('<div></div>').appendTo('body')
    .html('<div><h6>Are you sure?</h6></div>')
    .dialog({
        modal: true,
        title: 'Delete message',
        zIndex: 10000,
        autoOpen: true,
        width: 'auto',
        resizable: false,
        buttons: {
            Yes: function () {
                // $(obj).removeAttr('onclick');                                
                // $(obj).parents('.Parent').remove();

                $(this).dialog("close");
            },
            No: function () {
                $(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $(this).remove();
        }
    });
});