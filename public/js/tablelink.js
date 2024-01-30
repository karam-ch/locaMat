document.addEventListener('DOMContentLoaded', () => {
    Array.from(document.getElementsByClassName('rowlink')).forEach((row) => {
        row.onclick = () => {
            window.location = row.dataset.href;
        };
    });
});
