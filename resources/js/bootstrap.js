window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.incrementLike = async (articleId) => {
    let { data } = await window.axios.put(`http://localhost:8000/api/like/${articleId}`)
    let button = document.getElementById(`like_button_${articleId}`)
    let span = button.getElementsByTagName('span')[0]
    span.textContent = data
}

const form = document.getElementById('commentSend')



window.sendComment = async (e) => {
    e.preventDefault()
    // console.log('hola');
    let formData = new FormData(form)

    try {
        const { data } = await window.axios.post('http://localhost:8000/api/comment', formData)
        form.style.display = 'none'
        let statusField = document.getElementById('form_send_status')
        statusField.classList.remove('hidden')
        statusField.textContent = 'Ваше сообщение успешно отправлено'
        console.log(data)
    } catch (error) {
        let subject = document.getElementById('subject')
        let body = document.getElementById('body')
        let block = document.createElement('div')
        let block_body = document.createElement('div')
        block.append(error.response.data.errors.subject[0])
        block_body.append(error.response.data.errors.body[0])
        subject.after(block)
        body.after(block_body)
        // error.response.data.forEach(element => {
        // console.log(element);
        // let input = document.getElementById(element)
        // let block = document.createElement('div')
        // block.append(element[0])
        // input.after(block)
        // });
        console.log(error.response.data)
    }
}

if (form) {
    form.addEventListener('submit', window.sendComment)
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
