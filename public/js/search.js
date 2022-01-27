var $ideapark_search_input = $('.js-ajax-search-input');
var $ideapark_search_loader = $('<i class="h-loading c-header-search__loading"></i>');
var $ideapark_search_input = $('.js-ajax-search-input');
var ideapark_search_input_filled = false;

$ideapark_search_input.on('keydown', function(e) {
    var $this = $(this);
    var is_not_empty = !ideapark_empty($this.val().trim());
    if (e.keyCode == 13) {
        e.preventDefault();
        if (is_not_empty) {
            $this.closest('form').submit();
        }
    } else if (e.keyCode == 27) {
        ideapark_search_popup(false);
    }
}).on('input', function() {
    var $this = $(this);
    var is_not_empty = !ideapark_empty($this.val().trim());
    if (is_not_empty && !ideapark_search_input_filled) {
        ideapark_search_input_filled = true;
        $('.js-search-clear').addClass('active');
    } else if (!is_not_empty && ideapark_search_input_filled) {
        ideapark_search_input_filled = false;
        $('.js-search-clear').removeClass('active');
    }
    searchBar();
    // ajaxSearchFunction();
});

function searchBar() {
    var searchUrl = $('#searchUrl').val();
    var tokken = $('#tokken').val();
    var q = $ideapark_search_input.val();
    var container = $('.js-ajax-search-result');
    container.empty();
    if (q != "") {
        $ideapark_search_loader.insertBefore($ideapark_search_input);
        $.ajax({
            url: searchUrl,
            type: 'POST',
            data: {
                _token: tokken,
                q: q
            },
            success: function(results) {
                $ideapark_search_loader.remove();
                if (results != "" && results.length > 0) {
                    container.html(results);
                }
            }
        });
    }
};