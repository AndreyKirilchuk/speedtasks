window.onclick = (e) => {

    const el = document.createElement('div');

    el.classList.add('round');


    const x = e.clientX;
    const y = e.clientY;

    el.style.left = `${x - 25}px`;
    el.style.top = `${y - 25}px`;

    document.body.appendChild(el);

    setTimeout(() => {
        el.remove();
    }, 500)

}