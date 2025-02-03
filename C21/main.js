const countsElements = 3;


for(let i = 1; i <  countsElements + 1; i++)
{
    const x = Math.random() * (window.innerWidth - 50);
    const y = Math.random() * (window.innerHeight - 50);

    const el = document.createElement('div');
    el.style.left = (x - 50) + "px";
    el.style.top = (y - 50) + "px";
    el.style.width = "100px";
    el.style.height = "100px";
    el.style.borderRadius = "50%";
    el.style.position = "absolute";
    el.style.background = `rgb(${Math.round(Math.random() * 255)}, ${Math.round(Math.random() * 255)}, ${Math.round(Math.random() * 255)})`;
    el.id = i;

    if(i > 10)
    {
        const removeel = document.getElementById(i - 10);

        removeel.remove();
    }

    document.body.appendChild(el);
}