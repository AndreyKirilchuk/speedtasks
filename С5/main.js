function setColor()
{
    const input = event.target.value;
    const first = input.slice(0,1).toLowerCase();


    if(first === "#" && input.length === 7)
    {

        const r = parseInt(input.slice(1,3), 16);
        const g = parseInt(input.slice(3,5), 16);
        const b = parseInt(input.slice(5,7), 16);
        
        type.innerHTML = 'HEX';
        hex_span.innerHTML = input;
        rgb_span.innerHTML = `rgb(${r},${g},${b})`;
    }

    if(first === "r")
    {
        const rgb = input.slice(4,-1).split(',');

        type.innerHTML = 'RGB';
        hex_span.innerHTML = `#${(+rgb[0]).toString(16)}${(+rgb[1]).toString(16)}${(+rgb[2]).toString(16)}`;
        rgb_span.innerHTML =  input;
    }
}