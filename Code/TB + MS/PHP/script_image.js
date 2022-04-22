var changement_image = document.getElementById('test_picture');

changement_image.addEventListener('change',() => {
    PreviewChange()
});


var preview_image = document.getElementById('preview');

var PreviewChange = function (e)
{
    const [picture] = e.files;

    if (picture) {
        var reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
        };

        reader.readAsDataURL(picture);
    };
};

