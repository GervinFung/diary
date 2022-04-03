import axios from 'axios';

const removeUpload = () => {
    const [toolbar] = document.getElementsByClassName('ck ck-toolbar');
    toolbar.children[10].remove();
    toolbar.children[7].remove();
};

const parseIdFromHref = () => {
    const {
        location: { href },
    } = window;
    const id = href.split('/').pop();
    return parseInt(id, 10);
};

const sendContent = () => {
    const [doc] = document.getElementsByClassName(
        'ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline ck-blurred'
    );
    if (!doc) {
        throw new Error('Where is the text editor bro?');
    }
    const id = parseIdFromHref();
    // setInterval(() => {
    //     axios
    //         .post(`/api/diary/${id}`, {
    //             content: doc.innerHTML,
    //         })
    //         .catch(alert);
    // }, 5 * 1000);
};

sendContent();
removeUpload();
