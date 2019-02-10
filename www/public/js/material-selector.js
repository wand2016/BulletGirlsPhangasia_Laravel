function updateSubcategories () {
    var category_id = $('#category-selector')[0].value;
    $('#subcategory-selector>option').wrap('<span>');
    $('#subcategory-selector>span>option[data-category-id="' + category_id +'"]').unwrap();

    // selectedがいたらselectする
    var selected = $('#subcategory-selector>option[selected]');
    if (selected.length > 0) {
        $('#subcategory-selector').val(selected.val());
    }
    updateMaterials();
}

function updateMaterials () {
    var subcategory_id = $('#subcategory-selector')[0].value;
    $('#material-selector>option').wrap('<span>');
    $('#material-selector>span>option[data-subcategory-id="' + subcategory_id + '"]').unwrap();

    // selectedがいたらselectする
    var selected = $('#material-selector>option[selected]');
    if (selected.length > 0) {
        $('#material-selector').val(selected.val());
    }

    $('#material-list tr').hide();
    $('#material-list tr:first-of-type').show();
    $('#material-list tr[data-subcategory-id="' + subcategory_id + '"]').show();
}

$('#category-selector').on('change', updateSubcategories);
$('#subcategory-selector').on('change', updateMaterials);


$(function () {
    updateSubcategories();
});
