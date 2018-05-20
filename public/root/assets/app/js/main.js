$('button[type=submit]').on('click', function(e) {
    $(this).addClass('m-loader m-loader--light m-loader--right');
});

// destroy
$('#table').on('click', '.destroy_resource', function(e) {
    e.preventDefault();
    
    var link = $(this);
    var modal = $(link.data('target'));
    var form = $(link.data('form'));
    var action = link.data('action');
    var resource = {
        'name': link.data('resource-name')
    };

    // assign action to hidden form action attribute.
    form.attr({action: action});

    // assign message to modal-text wrapper children element.
    $('.modal-text').html('\
        <p class="text-center">\
            You are destroying the resource: \
	            <span class="m--font-boldest">' + resource.name + '</span>.\
            Please note that you cannot undo this action!\
        </p>\
    ');

    modal.modal({ backdrop: 'static', keyboard: false}).on('click', '#btn-confirm', function() {
        form.submit();
    });
});

// toggle
$('#table').on('click', '.toggle_resource', function(e) {
    e.preventDefault();

    var link = $(this);
    var modal = $(link.data('target'));
    var form = $(link.data('form'));
    var action = link.data('action');
    var resource = {
        'name': link.data('resource-name')
    };

    // assign action to hidden form action attribute.
    form.attr({action: action});

    // assign message to text wrapper children element.
    $('.text-wrapper').html('\
        <p class="text-center">\
            You are updating the availability of \
            <span class="m--font-boldest">' + resource.name + '</span>.\
            Please note that this will affect the visibility of this resource and other data related to it.\
        </p>\
    ');

    modal.modal({ backdrop: 'static', keyboard: false}).on('click', '#btn-confirm', function() {
        form.submit();
    });
});