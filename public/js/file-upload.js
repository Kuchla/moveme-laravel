if ($('#input-file').hasClass('file')) {
    $('#input-file').fileinput({
        theme: 'fas',
        showUpload: false,
        previewFileType: 'any',
        language: 'pt-BR',
        browseOnZoneClick: true,
        showRemove: false,
        initialPreviewAsData: true,
        initialPreview: $('#input-file')[0].defaultValue,
        fileActionSettings: {
            showDrag: false
        },
        showRemove: false,
        showClose: false,
        fileActionSettings: {
            showRemove: false
        },
        maxFileSize: 4096
    });
}
