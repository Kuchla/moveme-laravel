$("#profile-image").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="fa fa-fw fa-search"></i>',
    removeIcon: '<i class="fa fa-fw fa-window-close"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="'+ $('#profile-image')[0].defaultValue+'" + ' +'alt="Foto de perfil">',
    layoutTemplates: {main2: '{preview} ' + ' {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
