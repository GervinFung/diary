import axios from 'axios';

const removeUpload = () => {
    const [toolbar] = document.getElementsByClassName('ck ck-toolbar');
    toolbar.children[10].remove();
    toolbar.children[7].remove();
};

const sendContent = () => {
    const [doc] = document.getElementsByClassName(
        'ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline ck-blurred'
    );
    if (!doc) {
        throw new Error('Where is the text editor bro?');
    }
    // setInterval(() => {
    //     axios
    //         .post('/api/diary', {
    //             content: doc.innerHTML,
    //         })
    //         .then(({ data }) => {
    //             doc.innerHTML = data.content;
    //         })
    //         .catch(alert);
    // }, 5 * 1000);
};

sendContent();
removeUpload();
