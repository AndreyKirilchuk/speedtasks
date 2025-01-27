function search()
{
    const searchText = input.value;

    const rgb = `rgb(${Math.round(Math.random() * 255)}, ${Math.round(Math.random() * 255)}, ${Math.round(Math.random() * 255)})`;

    const regex = new RegExp(`(${searchText})`, 'g');
    
    content.innerHTML = content.innerHTML.replace(regex, `<span style="background-color: ${rgb};">${searchText}</span>`);
}