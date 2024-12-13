import { Toolbar } from "../../private/js/class/Toolbar.js";
import { Element } from "../../private/js/class/Element.js";
import { Button } from "../../private/js/class/Button.js";

const toolbar = new Toolbar('applications');

const all = new Button('all-btn', () => location.reload(true));
const sent = new Button('sent-btn', () => filterTable(0));
const seen = new Button('seen-btn', () => filterTable(1));
const interviewed = new Button('interviewed-btn', () => filterTable(2));
const position = new Button('position-btn', () => filterTable(3));

function filterTable(status){
    const filtered = collectionData.filter((item)=> item.status === status);

    toolbar.clearChildren();

    filtered.forEach(element => {
        let row = document.createElement('tr');
        for(let key in element){
            if(key != 'id'){
               if(key === 'status'){
                    let data = document.createElement('td');
                    
                    switch(element[key]){
                        case 0:
                            data.appendChild(document.createTextNode('Sent'));
                            break;
                        case 1:
                            data.appendChild(document.createTextNode('Seen'));
                            break;
                        case 2:
                            data.appendChild(document.createTextNode('Interviewed'));
                            break;
                        case 3:
                            data.appendChild(document.createTextNode('Position'));
                            break;       
                        default:
                            break;
                    }

                    row.appendChild(data);
               } else {
                    let data = document.createElement('td');
                    data.appendChild(document.createTextNode(element[key]));
                    row.appendChild(data);
               }
            }
        }
        toolbar.insert(row);
    });
}