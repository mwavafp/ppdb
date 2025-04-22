
$(document).ready(function() {
    const ids = ['deskripsi', 'visi', 'misi'];
    ids.forEach(id => {
        $('#' + id).summernote({
            placeholder: 'Tulis konten di sini...',
            tabsize: 2,
            height: 200
        });
    });

    $(window).on('load', function() {
        $('#loadingOverlay').fadeOut();
    });

    $('#pengaturanForm').on('submit', function() {
        $('#loadingOverlay').fadeIn();
    });

    $('a').on('click', function() {
        $('#loadingOverlay').fadeIn();
    });
});

