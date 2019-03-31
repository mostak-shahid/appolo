jQuery(document).ready(function($) {    
    var page_template = $('#page_template').val();
    show_meta_boxes (page_template);

    $('#page_template').change(function(){
        var page_template = $(this).val();
        show_meta_boxes(page_template);
    });

    function show_meta_boxes(page_template) {
        if(page_template == 'page-template/lightbox-page.php') {
            $('#_appolo_gallery_details').show();
        } else {
           $('#_appolo_gallery_details').hide(); 
        }
        if(page_template == 'page-template/gallery-page.php') {
            $('#_appolo_link_gallery_details').show();
        } else {
           $('#_appolo_link_gallery_details').hide();
        }
    }

}); 
