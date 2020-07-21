var chat_socket = (function (jQuery) {

    let loading = (function() {
        //show image loading
        let showLoading = function (element = 'body') {
            // create loading element
            if(!$('.loading').length) {
                $('#fade_overlay').remove();
                $(element).append('<div id="fade_overlay"><img class="fade_loading_element" id="fade_loading" src="/images/loadding.gif"/></div>')
            }

            let xPos = $(window).width() / 2;
            xPos -= 45;
            $('#fade_loading').css('left', xPos + 'px');
            $("#fade_overlay").show();
        };

        // hidden image loading
        let hideLoading = function () {
            $("#fade_overlay").hide();
        };

        return {
            showLoading,
            hideLoading
        }
    })();


    /** api **/
    let chatApi = function (url, method = 'GET', data = {}, dataType = 'JSON', other_element_load = 'body') {
        // loading.showLoading(other_element_load)
        return new Promise(function (res, rej) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url,
                method,
                dataType,
                data,
                success: response => {
                    // loading.hideLoading();
                    return res(response)
                },
                error: (error) => {
                    // loading.hideLoading();
                    return rej(error)
                }
            })
        });
    };

    /** global event */
    let globalEvent = function (event, element, callback, preventDefault = true) {
        jQuery(document).on(event, element, function (event) {
            if (!preventDefault) {
                event.preventDefault();
            }
            callback(jQuery(this), event);
        });
    };

    return {
        api: chatApi,
        globalEvent,
        loading
    }
})($);
