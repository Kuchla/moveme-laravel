$("#input-file").fileinput({
    theme: 'fas',
    showUpload: false,
    previewFileType: 'any',
    language: 'pt-BR',
    browseOnZoneClick: true,
    showRemove: false,
    initialPreviewAsData: true,
    initialPreview: $("#input-file")[0].defaultValue,
    fileActionSettings: {
        showDrag: false
    },
    maxFileSize: 4096});
