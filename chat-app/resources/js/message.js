const selectedContact = $("meta[name='selected_contact']");
const baseUrl = $("meta[name='base_url']").attr('content');
const inbox = $('.messages ul');


function fetchMessages() {
    let contactId = selectedContact.attr('content');
    $.ajax({
        method: 'GET',
        url: baseUrl + '/fetch-messages',
        data: {
            contact_id: contactId
        },
        beforeSend: function () {
            toggleLoader();
        },
        success: function (data) {
            setContactInfo(data.contact);
            inbox.empty();
            data.messages.forEach(value => {
                if (String(value.form_id) === String(contactId)) {
                    inbox.append(messageTemplate(value.message, 'sent'));
                } else {
                    inbox.append(messageTemplate(value.message, 'replies'));
                }
            });
        },        
        error: function (xhr, status, error) {},
        complete: function () {
            toggleLoader();
        }
    });
}

function toggleLoader() {
    const loader = document.querySelector('.loader');
    if (loader.style.display === 'none' || loader.style.display === '') {
        loader.style.display = 'block';
    } else {
        loader.style.display = 'none';
    }
}

function messageTemplate(text, className) {
    return `<li class='${className}'>
        <img src="${baseUrl}/default-images/default.jpg" alt="" />
        <p>${text}
        </p>
    </li>`
}

function sendMessage() {
    let contactId = selectedContact.attr('content');
    let messageBox = $('.message-box');
    let formData = $('.message-form').serialize();
    $.ajax({
        method: 'POST',
        url: baseUrl + '/send-message',
        data: formData + '&contact_id=' + encodeURIComponent(contactId),
        beforeSend: function () {
            let message = messageBox.val();
            inbox.append(messageTemplate(message, 'replies'));
            messageBox.val('');
        },
        success: function (data) {},
        error: function (xhr, status, error) {}
    });
}

function setContactInfo(contact) {
    $('.contact-name').text(contact.name);
}

$(document).ready(function () {
    $('.contact').on('click', function () {
        let contactId = $(this).data('id');
        selectedContact.attr('content', contactId);

        $('.blank-wrap').css('display', 'none');

        fetchMessages();
    });

    $('.message-form').on('submit', function (e) {
        e.preventDefault();
        sendMessage();
    });
});
