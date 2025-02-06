// Input your code

let drag = null
let dragContainer = null
let dragClone = null
let dragRect = null

const body = document.querySelector('body')

body.style.cursor = "move";

document.querySelectorAll('.card').forEach(card => {
    card.onmousedown = (e) => {
        drag = card;

        dragContainer = drag.parentElement
        dragRect = drag.getBoundingClientRect()
        document.body.appendChild(drag)

        drag.style.position = "absolute"
        drag.style.width = dragRect.width + "px";
        drag.style.height = dragRect.height + "px";
        drag.style.left = e.clientX - dragRect.width / 2 + "px"
        drag.style.top = e.clientY - dragRect.height / 2 + "px"
        drag.style.transform = "rotate(5deg)"
    }
})

window.onmousemove = (event) => {
    if(drag)
    {
        const moveEl = document.elementsFromPoint(event.clientX, event.clientY)
        const container = moveEl.find(e => e.classList.contains("group-sortable"))

        if(container)
        {
            if(!dragClone)
            {
                dragClone = document.createElement('div')

                dragClone.style.width = "100%"
                dragClone.style.height = dragRect.height + "px"

                container.appendChild(dragClone)
            }
        }else{
            if(dragClone)
            {
                dragClone.remove()
                dragClone = null
            }
        }

        drag.style.left = event.clientX - dragRect.width / 2 + "px"
        drag.style.top = event.clientY - dragRect.height / 2 + "px"
    }
}

const goDefault = () => {

    drag = null
    dragContainer = null
    dragClone = null
    dragRect = null
}

window.onmouseup = (event) => {
    if(drag)
    {
        const moveEl = document.elementsFromPoint(event.clientX, event.clientY)
        const container = moveEl.find(e => e.classList.contains("group-sortable"))

        if(container)
        {
            drag.style.width = "100%"
            drag.style.height = "auto"
            drag.style.position = "static"
            drag.style.transform = ""

            container.appendChild(drag)

            dragClone.remove()

            goDefault()
        }else{

            drag.style.width = "100%"
            drag.style.height = "auto"
            drag.style.position = "static"
            drag.style.transform = "none"

            dragContainer.appendChild(drag)
            goDefault()
        }
    }
}