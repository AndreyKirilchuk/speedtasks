function search()
{
    const searchText = input.value;

    const rgb = `rgb(${Math.round(Math.random() * 255)}, ${Math.round(Math.random() * 255)}, ${Math.round(Math.random() * 255)})`;

    content.innerHTML = content.innerText.replace(`${searchText}`, `<span style="background-color: ${rgb};">${searchText}</span>`);
}
