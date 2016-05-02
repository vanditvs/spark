jQuery(document).ready(function($) {
    var input = $("[data-tags=true]");

    if(input.length) {

        var maxTags = input.attr('data-maxTags').length ? input.attr('data-maxTags') : undefined;

        input.tagsinput({
            maxTags: maxTags,
        });
    }

});