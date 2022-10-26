console.log('check exist')
$(document).ready(function () {
    var options = {
        html: true,
        content: $('[data-name="popover-content"]')
    }
    var exampleEl = document.getElementById('example')
    console.log(exampleEl)
    var popover = new bootstrap.Popover(exampleEl, options)
    console.log(popover)
})

$('.chat-event').on('click', function () {
    getDataUrl($(this))
})

function getDataUrl(dom) {
    const type = dom.data('type')
    let url = ''
    switch (type) {
        default :
            url = dom.data('url');
            break;
    }

    console.log(url)
}
