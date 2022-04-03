import axios from 'axios';

const removeUpload = () => {
    const [toolbar] = document.getElementsByClassName('ck ck-toolbar');
    toolbar.children[10].remove();
    toolbar.children[7].remove();
};

<<<<<<< HEAD
=======
const parseIdFromHref = () => {
    const {
        location: { href },
    } = window;
    const id = href.split('/').pop();
    return parseInt(id, 10);
};

>>>>>>> 4266c4e7745c4f73b81803d597d575d02ecf07ba
const sendContent = () => {
    const [doc] = document.getElementsByClassName(
        'ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline ck-blurred'
    );
    if (!doc) {
        throw new Error('Where is the text editor bro?');
    }
<<<<<<< HEAD
    // setInterval(() => {
    //     axios
    //         .post('/api/diary', {
    //             content: doc.innerHTML,
    //         })
    //         .then(({ data }) => {
    //             doc.innerHTML = data.content;
    //         })
=======
    const id = parseIdFromHref();
    // setInterval(() => {
    //     axios
    //         .post(`/api/diary/${id}`, {
    //             content: doc.innerHTML,
    //         })
>>>>>>> 4266c4e7745c4f73b81803d597d575d02ecf07ba
    //         .catch(alert);
    // }, 5 * 1000);
};

sendContent();
removeUpload();
