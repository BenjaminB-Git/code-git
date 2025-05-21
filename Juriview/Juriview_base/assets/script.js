$('.list-docs').click(function(){
    var compId = this.id;
    var ajaxUrl = '../ajax.php';
    var data = {'id': compId};
    alert(compId)
    $.post(ajaxUrl, data, function(response){
        alert(response)
    })
})
