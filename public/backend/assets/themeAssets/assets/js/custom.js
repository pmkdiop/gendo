imageBiens = document.getElementById("image_product");
imageBiens.onchange = (evt) => {
    imge_view = document.getElementById("imge_view");
    imge_view.style.display = "block";
    const [file] = imageBiens.files;
    if (file) {
        imge_view.src = URL.createObjectURL(file);
    }
};

imageUser= document.getElementById("avatarUser");

imageUser.onchange = (evt) => {
    view_image = document.getElementById("viewImage");
    const [file] = imageUser.files;
    if (file) {
        view_image.src = URL.createObjectURL(file);
    }
};

$(function () {
    // This code will attach `fileselect` event to all file inputs on the page
    $(document).on("change", ":file", function () {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, "/").replace(/.*\//, "");
        input.trigger("fileselect", [numFiles, label]);
    });

    $(document).ready(function () {
        //below code executes on file input change and append name in text control
        $(":file").on("fileselect", function (event, numFiles, label) {
            var input = $(this).parents(".input-group").find(":text"),
                log = numFiles > 1 ? numFiles + " files selected" : label;

            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }
        });
    });
});
