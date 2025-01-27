function directToUrl(url) {
    window.location.href = url;
}

function displayFlexById(id) {
    document.getElementById(id).style.display = 'flex';
}

function displayNoneById(id) {
    document.getElementById(id).style.display = 'none';
}

function focusByContainerId(containerId) {
    const container = document.getElementById(containerId);
    const input = container.querySelector('input[type="text"]');
    
    if (input) {
        input.focus();
    }
}