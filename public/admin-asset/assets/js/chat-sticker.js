$(document).ready(function () {
    var options = {
        html: true,
        content: $('[data-name="popover-sticker"]')
    }
    var exampleEl = document.getElementById('sticker-select')
    var popover = new bootstrap.Popover(exampleEl, options)

    var optionEmojis = {
        html: true,
        content: $('[data-name="popover-emoji"]')
    }
    var emojiEle = document.getElementById('emoji-select')
    var emoPopover = new bootstrap.Popover(emojiEle, optionEmojis)
})

$('.chat-event').on('click', function () {
    getDataUrl($(this))
})

function getDataUrl(dom) {
    const mediaType = dom.data('type')
    let url = ''
    switch (mediaType) {
        default :
            url = dom.data('url');
            break;
    }

    $("input[name='type']").val('media');
    $("input[name='media_type']").val(mediaType);

    $("textarea#chat-textarea").removeAttr('name')
    $("textarea#chat-textarea-hidden").attr('name', 'comment');
    $("textarea#chat-textarea-hidden").val(url);

    $("#chat-form").submit();
}


$('#chat-submit').on('click', function () {
    $("#chat-form").submit();
})
