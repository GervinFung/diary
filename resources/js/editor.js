const removeUpload = () => {
    const [toolbar] = document.getElementsByClassName('ck ck-toolbar');
    toolbar.children[10].remove();
    toolbar.children[7].remove();
};

removeUpload();
