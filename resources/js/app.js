import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png, .jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        //para guardar la imagen si falta algun campo y el usuario pueda ver que se cargo la imagen
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name =
                document.querySelector('[name="imagen"]').value;
            //call hace llamar  a la funcion call  para hacerlo autpmatico.
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                '/Uploads/'+imagenPublicada.name+''
            );
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});
/*
dropzone.on('sending', function(file,xhr,formData){
console.log(file);

});
*/
dropzone.on("success", function (file, response) {
    document.querySelector('[name="imagen"]').value = response.imagen;
});
/*
dropzone.on('error', function(file,message){
console.log(message);

});*/

dropzone.on("removedfile", function () {
   document.querySelector('[name="imagen"]').value="";
});
