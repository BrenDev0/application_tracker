import { Table } from "../../private/js/class/Table.js";
import { Element } from "../../private/js/class/Element.js";
import { Button } from "../../private/js/class/Button.js";

const toolbar = new Table('applications');

const all = new Button('all-btn', () => location.reload(true));
const sent = new Button('sent-btn', () => toolbar.filterTable(collectionData, 0));
const seen = new Button('seen-btn', () => toolbar.filterTable(collectionData, 1));
const interviewed = new Button('interviewed-btn', () => toolbar.filterTable(collectionData, 2));
const position = new Button('position-btn', () => toolbar.filterTable(collectionData, 3));
const results = new Element('results');


const searchBar = document.getElementById('search');
searchBar.addEventListener('change',(e) => applicationSearch(e.target.value))

function applicationSearch(needle){
        results.clearChildren();
        console.log('cleared')
        const filteredResults = collectionData.filter((app) => app.position.startsWith(needle))
        filteredResults.forEach((i) => {
            let li = document.createElement('li');
            li.appendChild(document.createTextNode(i.position))
            results.insert(li)
        })
}